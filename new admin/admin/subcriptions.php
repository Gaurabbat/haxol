<!doctype html>
<html lang="en">
<?php
include 'html/header.php';
if($conn!=null && isset($_SESSION['name'])){
?>	
<body>
<?php
include 'html/sidePanel.php';
include 'html/navBar.php';
?>

   


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Subcriptions</h4>
								<hr>
                              </div>
                            <div class="content">
                                <div class="panel panel-default">
						<div class="panel-body">
							<table id = "adminTable"  class="display" style="width:100%">

 <thead><tr><th>SlNo.</th><th>Name</th><th>Email</th><th>Query</th></thead>
 <tbody>
 <?php $query = "SELECT `sid`,`email`,`name`,`body` FROM `subcriptions`";

			   $stmt = $conn->prepare($query);
 $allEmail="";
    // execute query
    $stmt->execute();
$num = $stmt->rowCount();
if ($num>0) {
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
		$allEmail=$allEmail.','.$email;
		
		?>
		<tr><td><?php echo $sid;?></td><td><?php echo $name;?></td><td><?php echo $email;?></td><td><?php echo $body;?></td></tr>
    <?php
	}
}
?>
</tbody>
</table>
						</div>
					</div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="row">
				<div class="col-sm-12">
                  <div class="card">
                            <div class="header">
                                <h4 class="title">All Emails</h4>
								<hr>
                              </div>
                            <div class="content">  
							<div class="tab-content">
								    <div class="tab-pane active" id="tab1">
								      <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST" action="uploadProduct">
										<div class="form-group">
										<div class="col-md-6">
											 Emails : <textarea type="text" class="form-control" name="pdesc" id="pdesc"
											 >
											 <?php echo $allEmail;?>
											 </textarea>
											 </div>
											 </div>
									    </form>
							</div>
					</div>
                    </div>
                </div>



                
            </div>
        </div>


              <?php
include 'html/footer.php';
?>

    </div>
</div>




</body>
<?php
}
else{
header('Location:logout');		
}
?>
    

	

</html>
