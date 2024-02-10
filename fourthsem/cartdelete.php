<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['username'])){
    header("Location: signin.php");
}else{
    $user = $_SESSION['user'];	
    $bookid = $_POST["bookid"];

	$delete = "DELETE FROM books WHERE ID = '$bookid'";
	if(mysqli_query($conn,$delete)){
		 header("Location: cartshow.php");
	}else{
		echo "Error";
	}

}


?>