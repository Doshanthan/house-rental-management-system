
<?php 
session_start();
	include('./include/connect.php');


	if(isset($_GET['submit'])){
		$username=$_POST['fname'];
		$user_mail=$_POST['email'];
		$password=$_POST['password'];
		$message=$_POST['message'];

		$sql="select * from `booking` where owner_email='$user_mail'";
		$select_query=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($select_query);
		$owner_email=$row['owner_email'];

		$insert_sql="insert into `contact` (contact_id,name,mail,owner_mail,message,password) values('$username','$user_mail','$owner_email','$message','$password')";
		$run_query=mysqli_query($con,$insert_sql);
		//if($)

	}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>about</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- font awesome linlk -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <script src="https://kit.fontawesome.com/2568cb3989.js" crossorigin="anonymous"></script> -->
	<!-- external css link -->
	<link rel="stylesheet" type="text/css" href="index.css">
	<style>
		body{
/*			background-color: #474e5d;*/
		}
	</style>

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
			    <div class="collapse navbar-collapse " id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-right ms-auto">
			        <li class="nav-item  px-3">
			          <a class="nav-link" aria-current="page" href="index.php">Home</a>
			        </li>
			        <li class="nav-item  px-3">
			          <a class="nav-link" href="about.php">About</a>
			        </li> 
			        <li class="nav-item  px-3">
			          <a class="nav-link active" href="contact.php">Contact</a>
			        </li>
			        <li class="nav-item dropdown  px-3">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            properties
			          </a>
			          <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
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
			        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			        <button class="btn btn-outline-light" type="submit">Search</button>
			      </form>
			    </div>
			</div>
			</nav>

		</div>
	
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
			        <li class="m-0 pt-2 ">
			          <p class="text-capitalize text-light fw-bold"><?php

			           if(isset($_SESSION['username'])&& !empty($_SESSION['username']))
			           		{
			           			echo 'welcome - '.$_SESSION['username'].'';
			           		}
			       		?></p>
			        </li>
			        <li class="nav-item dropdown  px-3">
			          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
			          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
						<div class="float-right">
							<a class="text-light mt-1 ms-0 text-decoration-none float-end" href="myaccount.php"><i class="fa-solid fa-user-tie fa-xl pe-1"></i>My account</a>
							<?php 
								if(!empty($_SESSION['email'])){
								
								$email=$_SESSION['email'];
								$sql="select * from `signin` where	email='$email'";
								$res=mysqli_query($con,$sql);
								$row=mysqli_fetch_assoc($res);


					      		if($row['position']=='Renter'){
					      			echo '<a class="text-light mt-1 ms-0 pe-4 text-decoration-none float-end" href="addproperties.php"><i class="fa-solid fa-file-circle-plus fa-xl mt-3 mx-2"></i>Add properties</a>
					      			<a class="text-light mt-1 ms-0 pe-4 text-decoration-none float-end" href="customer_booked_details.php"><img src="image/bell2.png" style="height:30px;width:30px;">5</a>';

					      			}
					      		}
			      			 ?>
							<!-- <a class="text-light mt-1 ms-0 text-decoration-none float-end" href="myaccount.php"><i class="fa-solid fa-user-tie fa-xl pe-1"></i>My account</a>
							<a class="text-light mt-1 ms-0 pe-4 text-decoration-none float-end" href="addproperties.php"><i class="fa-solid fa-file-circle-plus fa-xl mt-3 mx-2"></i>Add properties</a> -->

						</div>
				</div>	
			</nav>

		</div>


<!-- start -->
		<div class="container">
			<div class="row">
					<div class="d-flex mt-5 justify-content-center">
						<div class="col-4 mt-5">
							<?php 

								// if(isset($_GET['deleteacc'])){
									$search_var=$_SESSION['email'];

									$sql="select * from `signin` where email='$search_var'";
									$result=mysqli_query($con,$sql);
									$row=mysqli_fetch_assoc($result);
									$fname=$row['firstname'];
									$email=$row['email'];
									$mobile=$row['mobile'];
									$address=$row['address'];
									echo "<p><i class='fa-solid fa-user'></i> $fname</p>
									<p><i class='fa-solid fa-envelope'></i> $email</p>
									<p><i class='fa-solid fa-phone'></i> $mobile</p>
									<p><i class='fa-solid fa-address-book'></i> $address</p>";
									
									
									
									
									
									
								// }
							 ?>
							<!-- <p>email:chyankumar@gmail.com</p>
							<p>name:chayankumar</p>
							<p>phone:0763245699</p> -->
						</div>
						<div class="col-5">
							<form method="post">
								<input class="form-control mt-3" type="text" name="fname" placeholder="enter your name">
								<input class="form-control mt-3" type="email" name="email" placeholder="enter your email ">
								<input class="form-control mt-3" type="password" name="password" placeholder="enter your password">
								<textarea class="form-control mt-3" name="message" rows="8" placeholder="leave message here!!">leave message</textarea>
								<input type="submit" name="submit" class="btn btn-primary px-5 mt-3">
							</form>
						</div>
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
							<!-- <ul class="d-flex list-unstyled justify-content-center ">
								<li><a href="#" class="text-decoration-none px-1 text-light">home</a></li>
								<li><a href="#" class="text-decoration-none px-1 text-light">about</a></li>
								<li><a href="#" class="text-decoration-none px-1 text-light">contact</a></li>
								<li><a href="#" class="text-decoration-none px-1 text-light">vehicle</a></li>
								<li><a href="#" class="text-decoration-none px-1 text-light">login</a></li>
							</ul> -->
						</div>
						<div class="col-3 d-flex text-light ps-5 float-right ms-auto">
							<i class="fab fa-facebook fa-xl px-2"></i>
							<i class="fab fa-twitter fa-xl px-2"></i>
							<i class="fab fa-instagram fa-xl px-2"></i>
							<i class="fab fa-linkedin fa-xl px-2"></i>
						</div>
					</div>
					<div class="row">
						<div class="text-light text-center">
							<hr><p>Copyright © 2023 uovrent. <br>All Rights Reserved.</p>
							
						</div>
					</div>
				</footer>
		</div>

</body>
</html>