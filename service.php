<?php
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');  
   $url = "127.0.0.1";
   $database = "tododb";
   $username = "root";
   $password = "";

   $conn = mysqli_connect($url, $username, $password, $database);

   if(!$conn){
   	   die("Connection failed: " .$conn -->connect_error);
   }
$method = $_SERVER['REQUEST_METHOD'];
if($method == "GET"){
	   $sql = "SELECT * FROM Items";
	   $result = mysqli_query($conn, $sql);
	   $rows = array();

	   if(mysqli_num_rows($result) > 0){
	   	while($r = mysqli_fetch_assoc($result)){
	   		array_push($rows, $r);
	   	}

	   	print json_encode($rows);
	   } else{
	   	echo "No data";
	   }
	}
	else if($method == "POST")
	{
	    $desc = $_POST['itemDescription'];
		$dueDate = $_POST['itemDueDate'];
		$priority = $_POST['itemPriority'];

		$sql_insert = "INSERT INTO Items(itemId, itemDescription, itemDueDate, itemPriority) VALUES (0, '$desc', '$dueDate', '$priority')";
		if(mysqli_query($conn, $sql_insert)){
			echo "Item successfully added to the database";
	}
		else{
			echo "ERROR: $sql_insert did not run".mysqli_error($conn);
		}

	}
   mysqli_close($conn);

?>