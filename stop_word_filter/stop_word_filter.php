<?php

// Written by Ashley Jin, 2012

class stop_word_filter{

	// this is Lucene's list of stop words
	private $lucene_stop_words = array("a", "an", "and", "are", "as", "at", "be", "but", "by",
		"for", "if", "in", "into", "is", "it",
		"no", "not", "of", "on", "or", "such",
		"that", "the", "their", "then", "there", "these",
		"they", "this", "to", "was", "will", "with");

	// takes in a string (maybe a tweet message) and filters all the stop words out of it
	function filter_stop_words($input_string){
		//$input_string = "She was a happy bunny with a not so sunny disposition.";

		foreach($this->lucene_stop_words as &$stop_word)
    		$input_string = preg_replace("/\s". $stop_word ."\s/", " ", $input_string);

		//print $input_string . "\n";
		return $input_string;
	}
}
?>
