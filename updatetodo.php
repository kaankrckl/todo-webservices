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


	   $desc = $_POST['itemDescription'];
	   $itemId = $_POST['itemId'];
	   $priority = $_POST['itemPriority'];
	   $sql = "UPDATE Items SET itemDescription='$desc', itemPriority='$priority' WHERE itemId=$itemId";
	   mysqli_query($conn, $sql );
	   echo "$desc";

   mysqli_close($conn);

?>