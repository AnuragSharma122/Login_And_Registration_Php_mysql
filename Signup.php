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
<form method="post" name="form" action="">
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputname">Username</label>
      <input type="text" class="form-control" id="inputName" placeholder="Username" name="username" required>
    </div>
  

    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
      

    </span>
    </div>
    <div class="form-group col-md-6">
      <label for="confirmPassword4">Confirm Password</label>
      <input type="password" class="form-control" id="confirmPassword4" placeholder="Confirm Password" name="confirmPassword" required>
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" value="submit" name="submit">Sign in</button>
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
    // store user inputs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //see that email is already taken or not
    $query1 = "SELECT email FROM userdetails WHERE email = '$email'";
    $result1 = mysqli_query($connect, $query1);
    $row = mysqli_fetch_row($result1);

    //if password and confirm password is correct and email is not already taken
    if($password == $confirmPassword && $row == 0 )
    {
        $password = md5($password);
        $query = "INSERT INTO userdetails VALUES ('','$username','$email','$password')";
        
        $result = mysqli_query($connect,$query);

        //if data is entered succesfully than redirect to login page
        if($result == true)
        {
          

          header("Location: login.php");
          $username = '';
          $email = '';
          $password = '';
          $confirmPassword = '';
        }
    }
    //if email is already taken
    else if($row != 0)
    {
        echo "Email already taken";
    }
    //if password is not equal to confirm password
    else
    {
        echo "<h3>Password Error</h3>";
    }
    mysqli_close($connect);
}
?>
</body>
</html>