<?php
session_start();

include("db.php");

if($_SERVER['REQUEST_METHOD']== "POST")
{
$email = $_POST['Email'];
$Pass = $_POST['Password'];



if(!empty($email) && !empty($Pass))
{
$query = "select * from form where Mail='$email' limit 1";
$result = mysqli_query($con, $query);

if($result)
{
    if($result && mysqli_num_rows($result)>0)
    {
        $user_data=mysqli_fetch_assoc($result);

        if($user_data['Pass']== $Pass)
        {
            header('location: a.html');
            die;

        }
    }
}
echo "<script type='text/javascript'> alert('Wrong Username or Password') </script>";
}
else{
    echo "<script type='text/javascript'> alert('Wrong Username or Password') </script>"; 
}
}
?>


<!-- ------------------------------------------------------------------ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <form action="" name="formfill" onsubmit="return validation()" method="POST">
                <h2>Login In</h2>
                <p id="result"></p>
                <div class="inputbox">
                    <i class='bx bxs-envelope'></i>
                    <input type="email" name="Email" placeholder="Email">
                </div>
                <div class="inputbox">
                    <i class='bx bxs-lock'></i>
                    <input type="password" name="Password" placeholder="Password">
                </div>
                <div class="button">
                    <input type="submit" class="btn" onclick="validation()" value="Login">
                </div>
                <div class="group">
                    <span><a href="#">Forgot Password</a></span>
                    <span><a href="register.php">Not a user?</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>