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
                                <h4 class="title">Latest News</h4>
								<hr>
                              </div>
                            <div class="content">
                                <div class="panel panel-default">
						<div class="panel-body">
							<table id = "adminTable"  class="display" style="width:100%">

 <thead><tr><th>Category</th><th>Comapany</th><th>Area</th><th>News</th><th>Image</th><th>Action</th></tr></thead>
 <tbody>
 <?php $query = "SELECT `nid`,`ncategory`, `Company`, `Area`, `News`,`nimage` FROM `latestNews`";

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
		<tr><td><?php echo $ncategory;?></td><td><?php echo $Company;?></td><td><?php echo $Area;?></td><td><?php echo $News;?></td>
		<td><img src="<?php echo $nimage;?>" width="100" height="100"></td>
		<td>
		<form method="POST" action="deleteNews">
		<input type="hidden" name="nimage" value="<?php echo $nimage;?>">
		<input type="submit" name="delete" class="delete_btn" value="Delete">
		</form>
		</td>
		</tr>
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
                                <h4 class="title">Add New Trip Category</h4>
								<hr>
                              </div>
                            <div class="content">  
							<div class="tab-content">
								    <div class="tab-pane active" id="tab1">
								      <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST" action="uploadNews">
									  <div class="form-group">
											<div class="col-md-6">
										Select Category:
									<select class="form-control" name="ncategory">
		<option value="Infrastructure">Infrastructure</option>
		<option value="Public">Public Sector</option>
		<option value="Commercial">Commercial</option>
		<option value="Residential">Residential</option>
		<option value="Common">Common</option>
  </select>
														    </div>
															</div>
										  <div class="form-group">
											<div class="col-md-6">
											 Company : <input type="text" class="btn btn-default" name="Company" id="Company"
											 placeholder="Enter Company">
											 </div>
										</div>
										<div class="form-group">
										      <div class="col-sm-6">
										     Area : <input type="text" class="form-control" id="Area" name = "Area" placeholder="Enter Area"></textarea>
										    </div>
										  </div>
										  <div class="form-group">
										      <div class="col-sm-6">
										     News : <input type="text" class="form-control" id="News" name = "News" placeholder="Enter News"></textarea>
										    </div>
										  </div>
										   <div class="form-group">
										      <div class="col-sm-6">
										     Date and Time (January 22, 2018, 3:34 am) : <input type="text" class="form-control" id="time" name = "time" placeholder="Enter Time"></textarea>
										    </div>
										  </div>
										  <div class="form-group">
											<div class="col-md-6">
											 News Image : <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
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
