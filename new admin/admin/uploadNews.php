<?php
$loc="latestNews";
$area ="news";
$target_dir = "../../new/assets/images/".$area."/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$newfilename = round(microtime(true)).'.'.$imageFileType;
$target_file =$target_dir.$newfilename;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
		
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
		
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
		
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
		;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
		
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
		
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
include_once 'config/db.php';
$database = new Database();
$conn = $database->getConnection();	 
$Company = $_POST['Company'];
$Area = $_POST['Area'];
$News = $_POST['News'];
$time = $_POST['time'];
$Category = $_POST['ncategory'];
$query = "INSERT INTO `latestNews`( `ncategory`,`Company`, `Area`, `News`,`nimage`,`time`) VALUES ('".$Category."','".$Company."','".$Area."','".$News."','".$target_file."','".$time."')";
		$stmt = $conn->prepare($query);
    $stmt->execute();
	$num = $stmt->rowCount();
	if($num>0){
		header('Location:'.$loc.'');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	}
}
?>