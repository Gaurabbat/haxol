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
                                <h4 class="title">Amount Status</h4>
								<hr>
                              </div>
							  <?php $query = "SELECT `aid`,`raisedAmount`,`projectAmount` from amount";

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
				}
}
		?>
                            <div class="content">  
							<div class="tab-content">
								    <div class="tab-pane active" id="tab1">
								      <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST" action="projectStats">
										<div class="form-group">
											<div class="col-md-6">
											 Raised Amount : <input type="text" class="btn btn-default" name="raisedAmount" id="raisedAmount"
											 value="<?php echo $raisedAmount;?>">
											 </div>
										</div>
										<div class="form-group">
										      <div class="col-sm-6">
										     Project Amount : <input type="text" class="btn btn-default" id="projectAmount" name = "projectAmount" value="<?php echo $projectAmount;?>">
										    </div>
										  </div>
										<div class="form-group">
										 <input type="submit" value="Submit" name="submit" class="upload_btn" style=" float: left;margin-left: 20px;">
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
