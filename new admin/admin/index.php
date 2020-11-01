<?php
	if(!isset($_SESSION['phone'])){
?>

	<div class="container">
		<div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form class="form-group mb-3e btnless" action="loginCheck" method="POST">
				<div class="mt-120 mb-40 text-center">
					<h2 class="page-title">
						<span>Login</span>
					</h2>
				</div>
				<div class="m-10-0">
					<input 
					<?php 
						if(isset($_GET['err'])) 
							echo 'class="w-100p form-control field-error"'; 
						else 
							echo 'class="w-100p form-control"';?>
					type="text" name="phn" placeholder="Phone Number">
				</div>
				<div class="m-10-0">
					<input 
					<?php 
						if(isset($_GET['err'])) 
							echo 'class="w-100p form-control field-error"'; 
						else 
							echo 'class="w-100p form-control"';
					?>
					type="password" name="pin" placeholder="Email PIN" maxlength="6">
				</div>
				<div class="mt-40 text-center">
					<div class="mr-20 btn btn-success">
						<input type="submit" value="Submit">
					</div>
					<div class="btn btn-warning">
						<input type="reset" value="Reset">
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	}
	else{
		header('Location: logout');
	}
?>