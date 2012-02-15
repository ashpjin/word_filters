<?php
// Written by Ashley Jin, 2012

class word_filter{

	private $csv_filename;
	private $bad_words;
	private $replacements;

	public function __construct(){
		$this->csv_filename = "filtered_words.csv";
		$this->build_filter_arrays();
	}

	public function __destruct() {}

	private function build_filter_arrays(){
		$file = fopen($this->csv_filename, 'r');
		if($file == FALSE){
			echo "ERROR opening file " . $this->csv_filename . ".";
		}
		else {
			while(($line = fgetcsv($file)) !== FALSE){
				$this->bad_words[] = " " . $line[0] . " ";
				$this->replacements[] = " " . $line[1] . " ";
			}
		}
	}	

	public function clean_with_soap($message_text){
		return str_ireplace($this->bad_words, $this->replacements, $message_text);
	}
}
?>

