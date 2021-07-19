<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="Style.css">
    <title>Sign Up</title>
</head>
<body>
<main>
<section class="glass">
<div class="dashboard">
<div class="card">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" value ="submit" name="submit">Submit</button>
  
  <div id="emailHelp" class="form-text"><br><a href="Signup.php">Click Here To Sign up</a></div>
</form>
</div>
</div>
</section>
</main>


<?php
if(isset($_POST['submit']))
{
    $connect = mysqli_connect("localhost","root","","userdetails_webchat");

if($connect == false)
{
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $query =  "SELECT password FROM userdetails WHERE email = '$email'";

    $result = mysqli_query($connect, $query);

    $row1 = mysqli_fetch_array($result);

    if($row1 && $row1['password'] == $password)
    {
        echo "Sign Up Succesfully";
        header("Location: welcome.php");
        $email = '';
        $password = '';
    }
    else
    {
        echo "Incorrect email or password";
    }

}
?>

</body>
</html>