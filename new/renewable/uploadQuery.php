<?php
$loc="contact.php";
include '../config/db.php';
$database = new Database();
$conn = $database->getConnection();	 
$name = $_POST['name'];
$email= $_POST['email'];
$body = $_POST['body'];
$query = "INSERT INTO `subcriptions`( `name`, `email`, `body`) VALUES ('".$name."','".$email."','".$body."')";
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