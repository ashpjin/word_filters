<?php
// Written by Ashley Jin, 2012

include_once('db_modifier.php');

$db = new db_mod('localhost', 'root', 'adam17', 'twitter');
$res = $db->clean_messages();

?>
