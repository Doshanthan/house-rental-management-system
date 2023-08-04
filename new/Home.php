<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar" id="myTopnav">
        <h1 class="logo">G10<span>HOUSE</span></h1>
        <ul class="navlinks">
            <li class="active"><a href="Home.php">Home</a></li>
            <li><a href="about.php">about</a></li>
            <li class="dropdown">
            <a href="properties.php" class="dropbtn">properies</a>
            <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
            </div>
            </li>    
            <li><a href="contact.php">contact</a></li>
            <li><a href="#">payment</a></li>
            <li><button class="sctn">signup</button></li>
            <li><button class="ctn">signin</button></li>
        
        </ul>
        <img src="Images/menu.png" class="menuBtn"> 
    </nav>
<header>
    <div class="headercontent">
        <h1>The Perfect Home Awaits</h1>
        <h2>Rent and Relax!</h2>
    </div>
    <div class="wrapper">
    <span class="CloseIcon"><i class="bi bi-x"></i></span>
    <div class="formBoxLogin">
    <h2>Sign in</h2>
    <form action="#">
        <div class="selectRole">
            <input type="radio" name="role" value="renter">Renter
            <input type="radio" name="role" value="tenant" class="tenant">Tenant
        </div>
    <div class="inputBox">
        <span class="icon1"><i class="bi bi-person-circle"></i></span>
        <input type="email" class="email">
        <label>Email</label>
    </div>
    <div class="inputBox">
        <span class="icon1"><i class="bi bi-file-lock2-fill"></i></span>
        <input type="password" class="email">
        <label>Password</label>
    </div>
    <div class="rememberforget">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forget Password?</a>
    </div>
    <button type="submit" class="btn">Login</button>
    <div class="loginregister">
        <p>Don't you have an account?<a href="#" class="registerLink">Create an account</a></p>
    </div>
        </form>
    </div>
    <span class="CloseIcon"><i class="bi bi-x"></i></span>
    <div class="formReister">
    <h2>Register</h2>
    <form action="#">  
    <div class="inputBox">
        <input type="text" class="fname">
        <label>First Name</label>
    </div>
    <div class="inputBox">
        <input type="text" class="lname">
        <label>Last Name</label>
    </div>
    <div class="inputBox">
        <input type="password" class="password">
        <label>Password</label>
    </div>
    <div class="inputBox">
        <input type="password" class="confir">
        <label>Confirm</label>
    </div>
    <div class="inputBox">
        <input type="text" class="emal">
        <label>Email</label>
    </div>
    <div class="inputBox">
        <input type="text" class="tp">
        <label>Phone No</label>
    </div>
    <div class="selectRole">
            <input type="radio" name="role" value="renter">Renter
            <input type="radio" name="role" value="tenant" class="tenant">Tenant
     </div>
    <div class="rememberforget">
        <label><input type="checkbox">I agree to te term & conditions</label>
    </div>
    <button type="submit" class="rebtn">Register</button>
    <div class="register">
        <p>Already have an account?<a href="#" class="registerLink">Login</a>here</p>
    </div>
        </form>
    </div>
</div>
</header>

<section class="events">
<div class="row">
    <div class="column">
        <img src="Images/about.jpg" alt="about">
    </div>
    <div class="column">
        <h3>About Us</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos perferendis commodi eius, blanditiis pariatur et vero molestiae ratione beatae sapiente inventore in facere, quasi repellat? Ad veniam deleniti exercitationem corrupti! Temporibus fuga explicabo dolorum laborum veniam accusantium ullam recusandae debitis, esse modi, sint optio quas ratione voluptas soluta quia sapiente. </p>
            <a href="#" class="ctn">Explore more..</a>
    </div>
</div>
</section>
<section class="footer">
    <div class="icons">
        <div class="icon"><i class="bi bi-facebook"></i></div>
        <div class="icon"><i class="bi bi-twitter"></i></div>
        <div class="icon"><i class="bi bi-linkedin"></i></i></div>
        <div class="icon"><i class="bi bi-instagram"></i></div>
    </div>
    <p class="fot"><i>&copyG10HOUSE.All Rights Reserved</i></p>
</section> 
<script src="script.js"></script>
</body>
</html>