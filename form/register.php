 
<?php
session_start();

include("db.php");

if($_SERVER['REQUEST_METHOD']== "POST")
{
$user_name = $_POST['Username'];
$email = $_POST['Email'];
$Pass = $_POST['Password'];



if(!empty($email) && !empty($Pass) && !empty($user_name))
{
$query = "insert into form (UN, Mail, Pass) values ('$user_name', '$email', '$Pass')";

mysqli_query($con,$query);

echo "<script type='text/javascript'> alert('Succesfully Registered') </script>";
}
else{
echo "<script type='text/javascript'> alert('Enter valid information') </script>";
}
}
?>
<!-- -------------------------------------------------------------------------------- -->

<!-- HTML  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registration form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- First Creating a Registration form -->
    <div class="container">
        <div class="form-box">
            <form action="" name="formfill" onsubmit="return validation()" method="POST">
                <h2>Register</h2>
                <p id="result"></p>
                <div class="inputbox">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="Username" placeholder="Username">
                </div>
                <div class="inputbox">
                    <i class='bx bxs-envelope'></i>
                    <input type="email" name="Email" placeholder="Email">
                </div>
                <div class="inputbox">
                    <i class='bx bxs-lock'></i>
                    <input type="password" name="Password" placeholder="Password">
                </div>
                <div class="inputbox">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="Cpassword" placeholder="Confirm Password">
                </div>
                <div class="button">
                    <input type="submit" class="btn" onclick="validation()" value="Register">
                </div>
                <div class="group">
                    <span><a>Already a user?</a></span>
                    <span><a href="login.php">Login</a></span>
                </div>
            </form>
        </div>
    </div>

    <!-- ------------------------------------------------------------------- -->
    <!-- Creating a pop up value -->
    <!-- <div class="popup" id="popup">
        <ion-icon name="checkmark-circle-outline"></ion-icon>
        <h2>Thank you!</h2>
        <p>You have registered Successfully. Thanks!</p>
        <a href="login.html"><button onclick="CloseSlide()">OK</button></a>

    </div> -->
    <!-- ---------------------------------------------------------------------- -->

    <script src="script.js"></>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>