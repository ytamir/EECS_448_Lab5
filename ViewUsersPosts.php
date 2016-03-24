<?php
//Inside myfirstprogram.php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$user = $_GET["user"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "ytamir", "Password123!", "ytamir");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


echo "<table>";

echo "Table of all posts by $user";

$checkingquery = "SELECT Author_id,Content FROM Posts2";
	
	if ($result = $mysqli->query($checkingquery)) {
	echo "<tr>";
		  while ($row = $result->fetch_assoc()) {
		  	 if ($row["Author_id"] == $user)
		  	 {

		  	 echo "<td>".$row["Content"]."</td>";
		  	 }
		  	
		  	}
		  	echo "</tr>";

		  }


	
	 echo "</table>";
?>