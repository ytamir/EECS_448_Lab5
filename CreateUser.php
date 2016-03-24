<?php

//error displaying
error_reporting(E_ALL);
ini_set("display_errors", 1);

//flags
$alreadyauser = false;
$isnumfieldempty = false;


//initializing mysql
$mysqli = new mysqli("mysql.eecs.ku.edu", "ytamir", "Password123!", "ytamir");


//checking for a connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//collect and chck that the username inputted was not empty
$user = $_GET["user"];
if($user == "")
	{
		$isnumfieldempty = true;
		echo "Please put in a username";
	}
//echo "1";
//echo </br>;
//echo $user;


//check to make sure the usname is unique and hasnt been taken before 
if (!$isnumfieldempty)
{
	$checkingquery = "SELECT User_id FROM Users";
	//echo "2";
	if ($result = $mysqli->query($checkingquery)) {
	//echo "3";
		  while ($row = $result->fetch_assoc()) {
		  	//echo "4";
		  	if ($row["User_id"] == $user )
		  	{
		  		//echo "5";
		  		echo "THIS USERNAME IS ALREADY TAKEN PLEASE SELECT A NEW ONE";
		  		$alreadyauser =true;
		  		break;
		  	}

		  }


	}
	//if the usernamee is new
	if (!$alreadyauser)
	{
		//echo "6";
		$newitemquery = "INSERT INTO Users(User_id) VALUES ('$user')";
		//echo "7";
		if ( $succesfullyaddeditem = $mysqli->query($newitemquery))
		{
		//	echo"8";
			echo "A new user Has succesfully been added";
		}



	}

$result->free();
$mysqli->close();

}
?>
