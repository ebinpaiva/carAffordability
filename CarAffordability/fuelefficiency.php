
<?php
	$dbname = "cars";
  	$hostname = "localhost";
  	$username = "root";
  	$password = "password";
	$port = "3306";

	 $idmodel = $_POST["idmod"]; 
	 
	
	@ $db = new mysqli("$hostname", "$username", "$password", "$dbname", "$port");
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	else{
		$query1 = "select model.FuelEfficiency from model where idcarmodel ='$idmodel'"; 
		//$query0 = 'SELECT modelName FROM cars.model  inner join make on model.makeid = make.idmake where make.makeName = "bmw"';
		
		$result = $db->query($query1);
		$count = mysqli_num_rows($result);
	
		for($i=0;$i < $count;$i++)
		{
			$row = mysqli_fetch_row($result);
			$makes[] = $row[0];
		}
		echo JSON_encode($makes);
		mysqli_close($db);	 
	}
?>