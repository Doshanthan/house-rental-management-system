<?php 
	include('./include/connect.php');

	if(isset($_POST['submit'])){
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$address=$_POST['address'];
		$password=$_POST['password'];
		$conformpassword=$_POST['conformpassword'];
		$file=$_FILES['file']['name'];
		$position=$_POST['position'];

			if($fname==''or$lname==''or$email==''or $mobile==''or $address==''or $password==''or$conformpassword==''or$position==''){
				echo "<script>alert('some fields are empty fill those field')</script>";
			}else{
				$sql="select * from `signin`";
				$return_query=mysqli_query($con,$sql);
				while($row=mysqli_fetch_assoc($return_query)){
				$rev_email=$row['email'];
				if($rev_email==$email){
					echo "<script>alert('you have already signup using this email')</script>";
					header('location:signup.php');
					exit();
					}
				}
				if($password==$conformpassword){
					$sql="insert into `signin` (firstname,lastname,email,mobile,address,password,conformpassword,profile_image,position) values('$fname','$lname','$email','$mobile','$address','$password','$conformpassword','$file','$position')";
				$insert_quary=mysqli_query($con,$sql);
				echo "<script>alert('sccessfully signup')</script>";
				header('location:login.php');
			}else{
				echo "<script>alert('password and conform password is vary')</script>";
				
			}
			}
	

		
	}
 ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>vehiclerental</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- font awesome linlk -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <script src="https://kit.fontawesome.com/2568cb3989.js" crossorigin="anonymous"></script> -->
	<!-- external css link -->
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<!-- bootstrap script link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container-fluid bg-dark m-0 p-0">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-black">
			<div class="container-fluid ">
				<img src="homerental.png" class="logo" style="width:50px; height:50px;">
			    <a class="text-light transform-capitalize text-decoration-none mx-1 mt-2 logo_name"><h5><span class="text-warning">G10</span>House</h5></a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse text-capitalize" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-right ms-auto">
			        <li class="nav-item  px-3">
			          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
			        </li>
			        <li class="nav-item  px-3">
			          <a class="nav-link" href="about.php">About</a>
			        </li> 
			        <li class="nav-item  px-3">
			          <a class="nav-link" href="contact.php">Contact</a>
			        </li>
			        <li class="nav-item dropdown  px-3">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            properties
			          </a>
			          <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
			            <li><a class="dropdown-item" href="vehicle_all.php">All</a></li>
			          </ul>
			        </li>
			        <!-- <li class="nav-item">
			          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			        </li> -->
			      </ul>
			      
			      <form class="d-flex" action="Search_properties.php" method="get">
			      	<?php 
			      		if(!isset($_SESSION['email'])){
			      			echo '<a class="text-light px-5 d-flex text-center mt-2 text-decoration-none" href="login.php"><i class="fa-solid fa-user fa-xl mt-2 mx-2"></i>login</a>';
			      		}else{
			      			echo '<a class="text-light px-5 d-flex text-center mt-2 text-decoration-none" href="logout.php"><i class="fa-solid fa-user fa-xl mt-2 mx-2"></i>logout</a>';
			      		}
			      	 ?>
			      	
			        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
			        <input type="submit" name="search_data_product" value="Search" class="btn btn-outline-light">
			      </form>
			    </div>
			</div>
		
		</div>
	</nav>
</div>

<!-- second navigation bar -->
		<div class="container-fluid bg-secondary">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					
						<div class="float-left text-light ms-4">
							<nav class="navbar navbar-expand-lg navbar-dark">
			<div class="container-fluid ">
			    <button class="navbar-toggler me-5 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#seconddropdown" aria-controls="seconddropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse " id="seconddropdown">
			      <ul class="navbar-nav mb-2 mb-lg-0 text-right ms-auto">
			        <li class="m-0 pt-2">
			          <!-- <p>welcome :guest</p> -->
			        </li>
			        <li class="nav-item dropdown  px-3">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			           City
			          </a>
			          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			          	<?php 
			          		$sql="select * from `insert_brand`";
							$result=mysqli_query($con,$sql);

							if (!$result) {
								die(mysqli_error($con));
							}

							while($row=mysqli_fetch_assoc($result)){
								$brand_name=$row['brand_name'];
								$brand_id=$row['brand_id'];
								echo '<li><a class="dropdown-item" href="index.php?brand_id='.$brand_id.'">'.$brand_name.'</a></li>';
							}
	
			          	 ?>
			            <!-- 
			            <li><a class="dropdown-item" href="#">Bicycles</a></li>
			            <li><a class="dropdown-item" href="#">Motorbikes</a></li>
			            <li><a class="dropdown-item" href="#">light vehicles</a></li> -->
			          </ul>
			        </li>
			         <li class="nav-item dropdown  px-3">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            Village
			          </a>
			          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			          	<?php 
			          		$sql="select * from `category`";
							$result=mysqli_query($con,$sql);

							if (!$result) {
								die(mysqli_error($con));
							}

							while($row=mysqli_fetch_assoc($result)){
								$category_name=$row['category_name'];
								$category_id=$row['category_id'];
								echo '<li><a class="dropdown-item" href="index.php?category_id='.$category_id.'">'.$category_name.'</a></li>';
							}
	
			          	 ?>
			          	<!-- <li><a class="dropdown-item" href="#">YAMAHA</a></li>
			            <li><a class="dropdown-item" href="#">BAJAJ</a></li>
			            <li><a class="dropdown-item" href="#">HERO</a></li>
			            <li><a class="dropdown-item" href="#">HONDA</a></li> -->
			            
			          </ul>
			        </li>
			       
			      </ul>
			      
			     
			    </div>
			</div>
		</nav>
						</div>
						<div class="float-right ms-5">
							<?php 
					      		if(isset($_SESSION['email'])){
					      			echo '<a class="text-light mt-1 ms-0 text-decoration-none float-end" href="myaccount.php"><i class="fa-solid fa-user-tie fa-xl pe-1"></i>My account</a>
					      				<a class="text-light mt-1 ms-0 pe-4 text-decoration-none float-end" href="addproperties.php"><i class="fa-solid fa-file-circle-plus fa-xl mt-3 mx-2"></i>Add properties</a>';
					      		}
					      		
			      			 ?>

						</div>
				</div>	
			</nav>

		</div>
		<!-- third section -->
		<div class="container">
			<div class="row">
				<div class="col-6">
					<img src="image/signup.jpg" class="w-100 h-100 mt-3">
				</div>
				<div class="col-5 mx-auto mt-5 pb-3 text-dark rounded signin">
					<form class="" method="post" enctype="multipart/form-data">
						<div class="mt-5 text-center text-capitalize">
							<h4 class="text-primary">signup</h4>
						</div>
						<div class="text-center mt-4">
								<input id="Renter" type="radio" name="position" value="Renter">
								<label for="Renter" class="pe-4 fw-bold">Renter</label>
							
								<input id="User" type="radio" name="position" value="User">
								<label for="User" class="fw-bold">User</label>
							
						</div>
						<div class="pt-3 text-capitalize">
							<input class="form-control text-capitalize py-2 my-3" type="text" name="fname" placeholder="firstname here">
							<input class="form-control py-2 my-3  text-capitalize" type="text" name="lname" placeholder="lastname here">
							<input class="form-control py-2 my-3  text-capitalize" type="email" name="email" placeholder="email here">
							<input class="form-control py-2 my-3  text-capitalize" type="text" name="mobile" placeholder="mobile numbere here">
							<input class="form-control py-2 my-3  text-capitalize" type="text" name="address" placeholder="address here">
							<input class="form-control py-2 my-3  text-capitalize" type="password" name="password" placeholder="password here">
							<input class="form-control py-2 my-3  text-capitalize" type="password" name="conformpassword" placeholder="conform password here">
							<input class="form-control py-2 my-3  text-capitalize" type="file" name="file" placeholder="profile picture here">

							<button class="btn btn-primary w-100 d-grid mx-auto" type="submit" name="submit" >signup</button>
						</div>
							<p class="text-center text-primary"><a href="login.php" class="">already have an account?</a></p>
					</form>
				</div>

			</div>
			
		</div>
		
		<!-- footer -->
		<div class="container-fluid bg-dark">
			<footer class="bg-dark mt-5">
				<div class="row pt-5">
					<div class="col-4">
						<form class="d-flex ms-5">
					        <input class="form-control me-2" type="email" placeholder="email" aria-label="Search">
					        <button class="btn btn-outline-light" type="submit">Search</button>
			     		</form>
					</div>
					<div class="col-5 text-center ">
						<ul class="d-flex list-unstyled justify-content-center ">
							<li><a href="#" class="text-decoration-none px-1 text-light">home</a></li>
							<li><a href="#" class="text-decoration-none px-1 text-light">about</a></li>
							<li><a href="#" class="text-decoration-none px-1 text-light">contact</a></li>
							<li><a href="#" class="text-decoration-none px-1 text-light">vehicle</a></li>
							<li><a href="#" class="text-decoration-none px-1 text-light">login</a></li>
						</ul>
					</div>
					<div class="col-3 d-flex text-light ps-5 float-right ms-auto">
						<i class="fab fa-facebook fa-xl px-2"></i>
						<i class="fab fa-twitter fa-xl px-2"></i>
						<i class="fab fa-instagram fa-xl px-2"></i>
						<i class="fab fa-linkedin fa-xl px-2"></i>
					</div>
				</div>
				<div class="row">
					<div class="text-light text-center ms-5">
						<hr><p>Copyright © 2023 uovrent. <br>All Rights Reserved.</p>
						
					</div>
				</div>
			</footer>
		</div>
	
</body>
</html>