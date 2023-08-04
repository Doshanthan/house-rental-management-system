<?php 
	@session_start();
	include('./include/connect.php');
	ob_start();
	if(array_key_exists('submit', $_POST)){
	$email=$_POST['email'];
	$password=$_POST['password'];
	 $login_position=$_POST['position'];
	$_SESSION['email']=$email;
		$sql="select password from `signin` where email='$email'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$old_password=$row['password'];
		$login_position=$row['position'];
		if($password == $old_password &&$login_position==$row['position']){
			$_SESSION['username']=$row['lastname'];
			header('location:learnmore.php');
			 ob_end_clean();
			echo "<script>alert('successfully login');</script>";
			
		}else{
			echo "<script>alert('incorrect password');</script>";
		}

	}


 ?>


 <div class="container">
			<div class="row">
				<div class="col-6">
					<img src="picture/singin.png" class="w-100 h-100 mt-3">
				</div>
				<div class="col-5 mx-auto mt-5 pb-3 text-dark rounded signin">
					<form method="post">
						<div class="mt-5 text-center text-capitalize">
							<h4>signin</h4>
						</div>
						<div class="text-center mt-4">
								<input id="Renter" type="radio" name="position" value="Renter">
								<label for="Renter" class="pe-4 fw-bold">Renter</label>
							
								<input id="User" type="radio" name="position" value="User">
								<label for="User" class="fw-bold">User</label>
							
						</div>
						<div class="pt-3">
							
							<input class="form-control py-2 my-3" type="email" name="email" placeholder="email here">
			
							<input class="form-control py-2 my-3" type="password" name="password" placeholder="password here">
							
							<button class="btn btn-primary w-100 d-grid mx-auto mt-4" type="submit" name="submit" >signin</button>
						</div>
							<p class="text-center text-primary"><a href="signup.php" class="">don't have an account?</a></p>
					</form>
				</div>

			</div>
			
		</div>