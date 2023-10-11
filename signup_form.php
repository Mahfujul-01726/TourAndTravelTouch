<?php
$response = array();
include 'db_connect.php';
include 'functions.php';
 

  $whereto = $_POST['whereto'];	
  $howmany=$_POST['howmany'];	
  $arrival=$_POST['arrival'];
  $leaving=$_POST['leaving'];
  $text=$_POST['text'];
	
	//Check if user already exist
	if(!nameExists($text)){
 
		
		
		//Query to register new user
		$insertQuery  = "INSERT INTO information(whereto,howmany,arrival,leaving,textdata) VALUES (?,?,?,?,?)";
		if($stmt = $con->prepare($insertQuery)){
			$stmt->bind_param("sssss",$howmany,$howmany,$arrival,$leaving,$text);
			$stmt->execute();
			$response["status"] = 0;
			$response["message"] = "User created";
			$stmt->close();
			header("location:Tour And Travel Touch.html");
		}
	}
	else{
		$response["status"] = 1;
		$response["message"] = "User exists";
		header("location:Tour And Travel Touch.html");
	}

?>