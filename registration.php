<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location : index.php");
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobileno = $_POST["mobileno"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate =mysqli_query($conn,"SELECT * FROM tb_user WHERE email ='$email'");
if(mysqli_num_rows($duplicate)>0){
   echo
   "<script> alert('Email has already taken'); </script>";
}
else{
    if($password == $confirmpassword){
        $query = "INSERT INTO tb_user VALUES('','$name','$email','$mobileno','$password')";
        mysqli_query($conn,$query);
        echo
        "<script> alert('Registration Successful'); </script>";
    }
    else{
        echo
        "<script> alert('Password Does Not Match');</script>";
    }
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="./files/logo.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body class="register-body">

    <nav>
        <img src="./files/logo.png" class="logo" alt="Logo" title="FoodYard">
        
        <ul class="navbar">
            <li>
                <a href="./index.html">Home</a>
                <a href="./register.html">Get Involved</a>
                <a href="./about.html">About Us</a>
                <a href="./contact.html">Contact Us</a>
                <a href="./registration.php">Registration</a>
                <a href="./login.php">Login</a>

            </li>
        </ul>
    </nav>

    <section class="registration">
        <div class="register-form">
            <h1>Registration</h1>
            
            <form action="" method="post" autocomplete="off" onsubmit="return validateform()">

            <input type="text" name="myname1" placeholder="Your Name" id="name" required><br>
            <input type="email" name="myemail" placeholder="Your Email" id="" required><br>
            <input type="tel" name="myphone" placeholder="Your Phone No." id="phonenum" required><br>
            <input type="password" name="password" placeholder="Enter Password" id="password" required><br>
            <input type="password" name="password" placeholder="Confirm Password" id="password" required><br>
        
            <br><br>
            <input type="checkbox" name="t&c" id="" checked required> I accept the Terms & Conditions.
            <br>
            <input type="submit" value="Submit" class="submitbtn">

        </form>
        </div>
    </section>

<!-- Footer -->

<section class="footer">
    <div class="foot">
        <div class="footer-content">
            
            <div class="footlinks">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="./register.html">Donate</a></li>
                    <li><a href="./about.html">About Us</a></li>
                    <li><a href="./contact.html">Contact Us</a></li>
                    <li><a href="./registration.php">Registration</a></li>
                    <li><a href="./login.php">Login</a></li>

                </ul>
            </div>

            <div class="footlinks">
                <h4>Connect</h4>
                <div class="social">
                    <a href="" target="_blank"><i class='bx bxl-facebook'></i></a>
                    <a href="" target="_blank"><i class='bx bxl-instagram' ></i></a>
                    <a href="" target="_blank"><i class='bx bxl-twitter' ></i></a>
                    <a href="" target="_blank"><i class='bx bxl-linkedin' ></i></a>
                    <a href="" target="_blank"><i class='bx bxl-youtube' ></i></a>
                    <a href="" target="_blank"><i class='bx bxl-wordpress' ></i></a>
                    <a href="" target="_blank"><i class='bx bxl-github'></i></a>
                </div>
            </div>
            
        </div>
    </div>

    <div class="end">
        <p>Tel: 1800-00-000 | Email: support@thefoodrecoveryproject.com | Copyright © 2023 The Food Recovery Project | All Rights Reserved. <br>Website developed by: Patel Twisha | Patel Margee</p>
    </div>
</section>

<!-- Javascript -->
<script>
    function validateform(){ 
        var tel=document.getElementById("phonenum").value;  

        if(tel.length<10){  
            alert("Phone number must be of atleast 10 digits!");  
            return false;  
        } else if(isNaN(tel)){
            alert("Phone number should not include character!");
            return false;
        }
        return true;
}  
</script>

</body>
</html>