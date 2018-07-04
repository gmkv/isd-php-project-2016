<?php 
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
echo $path.'<br>'; // pwd command
echo dirname(__DIR__);
?>
