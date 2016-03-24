<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$alreadyapost = false;
$isauthorfieldempty = false;
$iscontentfieldempty = false;

$mysqli = new mysqli("mysql.eecs.ku.edu", "ytamir", "Password123!", "ytamir");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$content = $_GET["content"];
$author_id = $_GET["author_id"];

if($content == "")
	{
		$iscontentfieldempty = true;
		echo "Please put in a content";
	}
echo "1";	
if($author_id == "")
	{
		$isauthorfieldempty = true;
		echo "Please put in a author_id";
	}
echo "2";

if (!($iscontentfieldempty || $isauthorfieldempty)
{

	echo "3";
	
