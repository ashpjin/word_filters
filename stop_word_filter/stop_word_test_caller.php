<?php

// Written by Ashley Jin, 2012

include_once("factor_builder.php");

$empty_array = array("she", "he", "it");

$builder = new factor_builder($empty_array);
$builder->find_new_factors("She was a happy bunny with a not-so-sunny disposition.");

print_r($builder->get_updated_available_factors());

?>
