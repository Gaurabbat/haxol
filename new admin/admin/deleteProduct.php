<?php
    $path = $_POST['path'];
	unlink($path);
  $loc="addProduct";
include_once 'config/db.php';
$database = new Database();
$conn = $database->getConnection();	 
$query = "DELETE FROM `product` WHERE `pimage`='".$path."'";
		$stmt = $conn->prepare($query);
    $stmt->execute();
	
	if($stmt){
		header('Location:'.$loc.'');
		
    } else {
		header('Location:'.$loc.'');
	
    }
  
?>