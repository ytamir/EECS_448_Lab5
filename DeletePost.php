<?php
//Inside myfirstprogram.php
error_reporting(E_ALL);
ini_set("display_errors", 1);



$mysqli = new mysqli("mysql.eecs.ku.edu", "ytamir", "Password123!", "ytamir");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


$checkingquery = "SELECT Author_id,Content,Post_id FROM Posts2";
		
	//check to make sure that any are selected
	if (isset($_GET['id']))
	{		
		$idname = $_GET['id'];
		if ($result = $mysqli->query($checkingquery)) {
				//loop thorugh the table
		  while ($row = $result->fetch_assoc()) {
		  	//echo $idname[$row["Post_id"]];
		  	//check each row is selected
		  	if (isset($idname[$row["Post_id"]])){
		  		if ($idname[$row["Post_id"]]== 'on')
		  		{
		  			//printing out what is going to be deleted
		  			echo "The following entry will be deleted <br/>";
		  			echo "The Author was: "; 
		  			echo $row["Author_id"];
		  			echo "<br/>";
		  			echo "The Content was: "; 
		  			echo $row["Content"];
		  			echo "<br/>";
		  			echo "The Unique Identifier was: "; 
		  			echo $row["Post_id"];
		  			echo "<br/>";
		  			$postidtemp = $row["Post_id"];
		  			//delete it from the table
		  			$deletetemp = "DELETE FROM Posts2 WHERE Post_id=$postidtemp";
		  			if($result2 = $mysqli->query($deletetemp) )
		  			{
		  				echo "Delete has been Succesful<br/>";
		  			} 

		  			
		  		}
		  		
		  	}





		  		//foreach ($idname as $id)
		  		//{
		  		//	echo $id;
		  		//}
		  	}
		}
	}
	else
	{
		echo "Please select something to delete";
	}



$result->free();

$mysqli->close();



?>