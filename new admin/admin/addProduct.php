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
                                <h4 class="title">Manage Products</h4>
								<hr>
                              </div>
                            <div class="content">
                                <div class="panel panel-default">
						<div class="panel-body">
							<table id = "adminTable"  class="display" style="width:100%">

 <thead><tr><th>Product ID</th><th>Product Category</th><th>Product Name</th><th>Product Image</th><th>Date & Time</th><th>Place</th><th>Description</th><th>Action</th></thead>
 <tbody>
 <?php $query = "SELECT `pid`,`pcategory`, `pname`, `pimage`, `timestamp`,`place`,`pdesc` FROM `product`";

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
		<tr><td><?php echo $pid;?></td><td><?php echo $pcategory;?></td><td><?php echo $pname;?></td><td><img src="<?php echo $pimage;?>" width="100" height="100"></td><td><?php echo $timestamp;?></td><td><?php echo $place;?></td><td><?php echo $pdesc;?></td><td><form method="POST" action="deleteProduct"><input type="hidden" name="path" value="<?php echo $pimage;?>"><input type="submit" name="delete" class="delete_btn" value="Delete"></form> </td></tr>
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
                                <h4 class="title">Add New Product</h4>
								<hr>
                              </div>
                            <div class="content">  
							<div class="tab-content">
								    <div class="tab-pane active" id="tab1">
								      <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST" action="uploadProduct">
									  <div class="form-group">
											<div class="col-md-6">
										Select Category:
									<select class="form-control" name="pcategory">
		<option value="renewable">Renewable</option>
		<option value="agriculture">Agriculture</option>
		<option value="textile">Textile</option>
  </select>
														    </div>
															</div>
									<div class="form-group">						
									  <div class="col-md-6">
											 Product Name : <input type="text" class="form-control" name="pname" id="pname"
											 hint="Enter Product Name">
											 </div>
										</div>
										<div class="form-group">
											<div class="col-md-6">
											 Product Image : <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
											 </div>
											 </div>
										<div class="form-group">
										<div class="col-md-6">
											 Date&Time (January 11, 2019, 7:58 am) : <input type="text" class="form-control" name="timestamp" id="timestamp"
											 hint="Enter Date and Time">
											 </div>
											 </div>
										<div class="form-group">
										<div class="col-md-6">
											 Place : <input type="text" class="form-control" name="place" id="place"
											 hint="Enter Place">
											 </div>
										</div>
										<div class="form-group">
										<div class="col-md-6">
											 Description : <textarea type="text" class="form-control" name="pdesc" id="pdesc"
											 hint="Enter Description">
											 </textarea>
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
