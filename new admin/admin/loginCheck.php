<?php
include_once 'config/db.php';
$database = new Database();
$conn = $database->getConnection();
session_start();

	if(isset($_POST['phn']) && isset($_POST['pin'])) {
		
		$phone = preg_replace( '/[^0-9]/', '', $_POST['phn'] );
		$pass = $_POST['pin'];
//|| strlen($pass)>=8
		if(strlen($phone)==10 ){
			
			$query = "SELECT `aname` FROM `admin` WHERE `aphn` = '".$phone."' AND `apass` = '".$pass."'";

			   $stmt = $conn->prepare($query);
 
    // execute query
    $stmt->execute();
$num = $stmt->rowCount();

			if ($num>0) {
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
            $_SESSION['name']=$aname;
				$_SESSION['phone']=$phone;
				header('Location: addProduct');
    }


				
			}
			else {
				session_destroy();
				header('Location: index?err=1');
			}
		}
		else{
			session_destroy();
			header('Location: index?err=1');
		}
	}
	else {
		header('Location:logout');
	}
?>	

