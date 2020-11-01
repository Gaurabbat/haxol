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
                                <h4 class="title">Trip Category Mapping</h4>
								<hr>
                              </div>
                            <div class="content">
                                <div class="panel panel-default">
						<div class="panel-body">
							<table id = "adminTable"  class="display" style="width:100%">

 <thead><tr><th>Category Name</th><th>Trip Name</th><th>Action</th></tr></thead>
 <tbody>
 <?php $query = "SELECT category.cid,`cname`,product.pid, `pname` FROM `category` join categoryProduct on category.cid=categoryProduct.cid join product on product.pid=categoryProduct.pid";

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
		?>
		<tr><td><?php echo $cname;?></td><td><?php echo $pname;?></td><td><form method="POST" action="deleteCategoryTrip"><input type="hidden" name="pid" value="<?php echo $pid;?>"><input type="hidden" name="cid" value="<?php echo $cid;?>"><input type="submit" name="delete" class="delete_btn" value="Delete"></form></td></tr>
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
                                <h4 class="title">Add Trip to Category</h4>
								<hr>
                              </div>
                            <div class="content">  
							<div class="tab-content">
								    <div class="tab-pane active" id="tab1">
								      <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST" action="uploadCategoryTrip">
										<div class="form-group">
										     <div class="col-sm-6">
										Select the Trip:
										<select class="form-control" name="pid" value="<?php echo $pid?>">
									<?php $query = "SELECT `pid`, `pname` FROM `product` WHERE `pstatus`=1";

			echo $query;
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
		?>
		<option value="<?php echo $pid?>"><?php echo $pname?></option>
    <?php
	}
}
?>
  </select>
														    </div>
															</div>
										<div class="form-group">
										     <div class="col-sm-6">
										Select the Trip Category:
										<select class="form-control" name="cid" value="<?php echo $cid?>">
									<?php $query = "SELECT `cid`, `cname` FROM `category` WHERE `cstatus`=1";

			echo $query;
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
		?>
		<option value="<?php echo $cid?>"><?php echo $cname?></option>
    <?php
	}
}
?>
  </select>
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
