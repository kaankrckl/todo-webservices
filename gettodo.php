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



//echo "Hello World";
     $itemId =$_POST['itemId'];
     $sql = "SELECT * FROM Items WHERE itemId = $itemId ";
     $result = mysqli_query($conn, $sql);
     $rows = array();

     if(mysqli_num_rows($result) > 0){
      while($r = mysqli_fetch_assoc($result)){
        $rows[] = $r;
      }

   echo json_encode($rows);
/*    echo'<pre>';
      print_r($rows);
    echo'</pre>';*/
     } else{
      echo "No data";
     }

   mysqli_close($conn);

?>