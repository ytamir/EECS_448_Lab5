<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
//flags
$alreadyapost = false;
$isauthorfieldempty = false;
$iscontentfieldempty = false;
$isauser = false;

$mysqli = new mysqli("mysql.eecs.ku.edu", "ytamir", "Password123!", "ytamir");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
//variables had from html
$content = $_GET["content"];
$author_id = $_GET["author_id"];
//checking for empty inputs 
if($content == "")
	{
		$iscontentfieldempty = true;
		echo "Please put in a content";
	}
//echo "1";	
if($author_id == "")
	{
		$isauthorfieldempty = true;
		echo "Please put in a author_id";
	}
//echo "2";
	echo $author_id;
//if the inputs are valid check to make sur the user exitst
if (!($iscontentfieldempty || $isauthorfieldempty))
{
$checkingquery = "SELECT User_id FROM Users";
	
	if ($result = $mysqli->query($checkingquery)) {
	
		  while ($row = $result->fetch_assoc()) {
		  	
		  	if ($row["User_id"] == $author_id )
		  	{
		  
		  		$isauser =true;
		  		break;
		  	}

		  }
		  if(!$isauser)
		  {
		  echo "Please Input a valid user ID into the Author ID";
		  }
	}
}
//if the user is a valid user process the request and add it to the database 
if ($isauser)
{	
	$newitemquery = "INSERT INTO Posts2(Content, Post_id, Author_id) VALUES ('$content', 'NULL', '$author_id')";
		//echo "7";
		if ( $succesfullyaddeditem = $mysqli->query($newitemquery))
		{
			//echo"8";
			echo "A new post has succesfully been created";
		}


}

$result->free();
$mysqli->close();	
?>

