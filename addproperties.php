
	<?php 
	session_start();
	include('./include/connect.php');

		if($_SESSION['email']==''){
			echo "<script>alert('first of all you have to login');</script>";
			header('location:login.php');
		}

	if(isset($_POST['submit'])){


		
			$search_var=$_SESSION['email'];
			//get user_id
			$sql="select * from `signin` where email='$search_var'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_assoc($result);
			$user_id=$row['user_id'];
			$owner_name=$row['lastname'];
			$owner_email=$row['email'];
			$owner_phone=$row['mobile'];

		$type=$_POST['type'];
		$property_title=$_POST['property_title'];
		$rooms=$_POST['rooms'];
		$tables=$_POST['tables'];
		$description=$_POST['description'];
		$village=$_POST['select_category'];
		$city=$_POST['select_brand'];

		// get category_id
		
		$sql="select * from `category` where category_name='$village'";
		$result_get=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result_get);
		$get_category_id=$row['category_id'];

		//get brand_id

		$sql="select * from `insert_brand` where brand_name='$city'";
		$result_get=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result_get);
		$get_brand_id=$row['brand_id'];


			// $search_var=$_SESSION['email'];

			// $sql="select * from `signin` where email='$search_var'";
			// $result=mysqli_query($con,$sql);
			// $row=mysqli_fetch_assoc($result);


		$owner_name=$_POST['name'];
		$owner_email=$_POST['email'];
		$owner_phone=$_POST['phone'];
		$owner_location=$_POST['location'];

		$property_image1=$_FILES['front_image']['name'];
		$property_image2=$_FILES['back_image']['name'];
		$property_image3=$_FILES['side1_image']['name'];
		$property_image4=$_FILES['side2_image']['name'];

		$temp_image1=$_FILES['front_image']['tmp_name'];
		$temp_image2=$_FILES['back_image']['tmp_name'];
		$temp_image3=$_FILES['side1_image']['tmp_name'];
		$temp_image4=$_FILES['side2_image']['tmp_name'];


		if($rooms==''or $tables==''or $type==''or $description==''or $owner_name==''or $owner_email==''or $owner_phone==''or $owner_location==''or $property_image1==''or $property_image2==''or $property_image3==''or $property_image4==''){
			echo "<script>alert('fill all the available field')</script>";
			// header('location:addproperties.php');
			// exit();
		}else{

			   move_uploaded_file($temp_image1,'./image/'.$property_image1);
			   move_uploaded_file($temp_image2,'./image/'.$property_image2);
			   move_uploaded_file($temp_image3,'./image/'.$property_image3);
			   move_uploaded_file($temp_image4,'./image/'.$property_image4);

			
			$sql="insert into `houseproperties` (category_id,brand_id,user_id,property_name,image1,image2,image3,image4,rooms,type,tables,description,owner_name,owner_mail,owner_phone,owner_map,status) values ('$get_category_id','$get_brand_id','$user_id','$property_title','$property_image1','$property_image2','$property_image3','$property_image4','$rooms','$type','$tables','$description','$owner_name','$owner_email','$owner_phone','$owner_location','available')";

			$result=mysqli_query($con,$sql);
			if($result){
				echo "<script>alert('successfully added');</script>";
			}else{
				die(mysqli_error($con));
			}

		}

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>addproperties</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- font awesome linlk -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <script src="https://kit.fontawesome.com/2568cb3989.js" crossorigin="anonymous"></script> -->
	<!-- external css link -->
	<!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
</head>
<body style="background: rgba(227, 229, 229, 1.0);">
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
			            vehicle
			          </a>
			          <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
			            <li><a class="dropdown-item" href="#">All</a></li>
			            
			          </ul>
			        </li>
			        <!-- <li class="nav-item">
			          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			        </li> -->
			      </ul>
			      
			      <form class="d-flex">
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


	<div class="container">
		<div class="row">
			<div class="maindiv mt-5 ">
				<form method="post" enctype="multipart/form-data" class="rounded w-75 px-3 mx-auto mb-5 text-capitalize form_addproperties border border-primary ">
			<div class="align-items-center pb-3 div1_addproperties p-3 my-2">
				<h5 class="text-center"><span class="text-light rounded-circle bg-success">+</span>Add Property</h5>
				<label class="form-label">property_title</label>
				<input class="form-control" type="text" name="property_title" autocomplete="off" required>
				<div class="d-flex pt-4">
					<select class="form-select w-50" name="select_brand" required>
						<option>select city</option>
						<?php 
							$sql="select * from `insert_brand`";
							$insert_quary=mysqli_query($con,$sql);

							if($insert_quary){
								echo "success";
							}else{
								die(mysqli_error($con));
							}

							while ($row=mysqli_fetch_assoc($insert_quary)) {
								$brand_name=$row['brand_name'];
								echo '<option>'.$brand_name.'</option>';
							}
						 ?>
					</select>
					<select class="form-select w-50" name="select_category" required>
						<option>select village</option>
						<?php 
							$sql="select * from `category`";
							$insert_quary=mysqli_query($con,$sql);

							if($insert_quary){
								echo "success";
							}else{
								die(mysqli_error($con));
							}

							while ($row=mysqli_fetch_assoc($insert_quary)) {
								$category_name=$row['category_name'];
								echo '<option>'.$category_name.'</option>';
							}
						 ?>
					</select>
				</div>
				<label class="form-label">description</label>
				<textarea class="form-control" rows="5" name="description"></textarea>

				<label class="form-label">type</label>
				<input class="form-control" type="text" name="type" required>

				<label class="form-label">rooms</label>
				<input class="form-control" type="text" name="rooms" required>

				<label class="form-label">tables</label>
				<input class="form-control" type="text" name="tables">

				
			</div>
			<div class="div2_addproperties p-3 my-2">
				<hr class="border border-primary ">
				<h5>upload images</h5>
				<label class="from-label">front</label>
				<input class="form-control" type="file" name="front_image">
				<label class="from-label">back</label>
				<input class="form-control" type="file" name="back_image">
				<label class="from-label">side1</label>
				<input class="form-control" type="file" name="side1_image">
				<label class="from-label">side2</label>
				<input class="form-control" type="file" name="side2_image">
			</div>
			<div class="div3_addproperties  p-3 my-2">
				<hr class="border border-primary ">
				<h5>contact details</h5>
				<label class="form-label">name</label>
				<input class="form-control" type="text" name="name" required value=<?php echo $_SESSION['username'] ?>>
				<label class="form-label">email</label>
				<input class="form-control" type="email" name="email" required value=<?php echo $_SESSION['email'] ?>>
				<label class="form-label">phone</label>
				<input class="form-control" type="phone" name="phone" required>
				<label class="from-label">location</label>
				<input class="form-control" type="text" name="location">
			</div>
			<button type="submit" name="submit" class="btn btn-primary mt-3 px-5 mb-3 w-100 ms-2">post</button>
		</form>
		
			</div>
		</div>
		
	</div>
	<!-- footer -->
	<div>
		<?php 
		include('footer.php');
		 ?>
	</div>
</body>
</html>