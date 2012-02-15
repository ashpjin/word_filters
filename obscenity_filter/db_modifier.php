<?php
// Written by Ashley Jin, 2012

include_once('obscenity_filter.php');

class db_mod{
	
	//connection information
	private $database;	// twitter
	private $username;	
	private $password;
	private $host;		

	// db connection
	private $conn;
	private $str_modder;

	// open the db connection
	public function __construct($sethost, $setuser, $setpass, $setdatabase){
		
		$this->host = $sethost;
		$this->username = $setuser;
		$this->password = $setpass;
		$this->database = $setdatabase;

		$this->conn = mysql_connect($this->host, $this->username, $this->password)
			or die('ERROR: Could not connect to host: ' . mysql_error());
		
		mysql_select_db($this->database)
			or die ('ERROR: Could not enter database.');
		
		$this->str_modder = new word_filter();
	}

	// close the db connection
	public function __destruct() {
		mysql_close($this->conn);
	}

    // used in the array generator and the progressive loader
    public function clean_messages(){
		$query = "SELECT message_text, id FROM search_result;";
		$res = mysql_query($query);

		while($row = mysql_fetch_assoc($res)){
			$cleaned_msg = $this->str_modder->clean_with_soap($row['message_text']);	
//	echo $cleaned_msg . "\n";
			$row_query = "UPDATE search_result SET message_text_clean='" . mysql_real_escape_string($cleaned_msg) . "' WHERE id=" . $row['id'] . ";";
			mysql_query($row_query);
		}
	
        if(!$res) {
	        echo "ERROR (Query): " . mysql_error() . "\n";
            return false;
        } else { return true; }
    } 

}
?>
