<?php
	$dbname = "cars";
  	$hostname = "localhost";
  	$username = "root";
  	$password = "password";
	$port = "3306";
	
	
	$make = 'bmw'; //$_POST["make"]; 
	$year = 2000;//$_POST["year"]; 

	@ $db = new mysqli("$hostname", "$username", "$password", "$dbname", "$port");
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	else{
		$query1 = "select model.modelName from model inner join make on model.makeid = make.idmake inner join years on make.idYear = years.idyear where make.MakeName = '$make' && years.yearName ='$year'";
		$query0 = "select model.modelName from cars.model makeid = 3'";
							
		echo "The query is : ".$query1;
		$result = $db->query($query1);
		$count = mysqli_num_rows($result);
	
	for($i=0;$i < $count;$i++)
		{
			$row = mysqli_fetch_row($result);
			$modelss[] = $row[0];
		}
		echo JSON_encode($modelss);
		mysqli_close($db);	 
	}
?>