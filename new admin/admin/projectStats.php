<?php
$area ="dealer";
$loc="addProjectStat";
// Check if image file is a actual image or fake image
	include_once 'config/db.php';
$database = new Database();
$conn = $database->getConnection();	 
$raisedAmount = $_POST['raisedAmount'];
$projectAmount= $_POST['projectAmount'];
$query = "UPDATE amount
SET projectAmount = '".$projectAmount."', raisedAmount = '".$raisedAmount."'
WHERE aid='1';";
		$stmt = $conn->prepare($query);
    $stmt->execute();
	$num = $stmt->rowCount();
	if($num>0){
		header('Location:'.$loc.'');
    } else {
        echo "Sorry, there was an error uploading your file.";
		echo $query;
    }
?>