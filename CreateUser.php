<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$alreadyauser = false;
$isnumfieldempty = false;

$mysqli = new mysqli("mysql.eecs.ku.edu", "ytamir", "Password123!", "ytamir");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user = $_GET["user"];
if($user == "")
	{
		$isnumfieldempty = true;
		echo "Please put in a username";
	}
echo "1";
//echo </br>;
echo $user;



if (!$isnumfieldempty)
{
	$checkingquery = "SELECT User_id FROM Users";
	echo "2";
	if ($result = $mysqli->query($checkingquery)) {
	echo "3";
		  while ($row = $result->fetch_assoc()) {
		  	echo "4";
		  	if ($row["User_id"] == $user )
		  	{
		  		echo "5";
		  		echo "THIS USERNAME IS ALREADY TAKEN< PLEASE SELECT A NEW ONE";
		  		$alreadyauser =true;
		  		break;
		  	}

		  }


	}

	if (!$alreadyauser)
	{
		echo "6";
		$newitemquery = "INSERT INTO Users(User_id) VALUES ('$user')";
		echo "7";
		if ( $succesfullyaddeditem = $mysqli->query($newitemquery))
		{
			echo"8";
		}



	}
	
$result->free();
$mysqli->close();

}
?>
