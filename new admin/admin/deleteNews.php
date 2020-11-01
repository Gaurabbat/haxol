<?php
    $nimage = $_POST['nimage'];
	unlink($nimage);
  $loc="latestNews";
include_once 'config/db.php';
$database = new Database();
$conn = $database->getConnection();	 
$query = "DELETE FROM `latestNews` WHERE `nimage`='".$nimage."'";
		$stmt = $conn->prepare($query);
    $stmt->execute();
	
	if($stmt){
		header('Location:'.$loc.'');
		
    } else {
		header('Location:'.$loc.'');
	
    }
  
?>