<?php 
    $servername = "localhost";
    $username = $_GET['username'];
    $password = $_GET['password'];
    $db = $_GET['database'];

    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
      if($_GET['status'] == 1200){
          $result = $conn -> query("drop database $db");
          echo "success";
      }else{
        echo "failed";
      }
    }
    
    
?>
