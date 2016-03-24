<?php
//Inside myfirstprogram.php
error_reporting(E_ALL);
ini_set("display_errors", 1);



$mysqli = new mysqli("mysql.eecs.ku.edu", "ytamir", "Password123!", "ytamir");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


echo "<table>";



$checkingquery = "SELECT User_id FROM Users";
	
	if ($result = $mysqli->query($checkingquery)) {
	echo "<tr>";
		  while ($row = $result->fetch_assoc()) {
		  	 

		  	 echo "<td>".$row["User_id"]."</td>";
		  	 
		  	
		  	}
		  	echo "</tr>";

		  }


	
	 echo "</table>";
?>