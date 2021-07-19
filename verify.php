<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method="post" name="form" action="">
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputname">OTP</label>
      <input type="number" class="form-control" id="inputName" placeholder="otp" name="otp" required>
    </div>
   </div>
   <br>
  <button type="submit" class="btn btn-primary" value="submit" name="submit">Verify</button>
</form>
<?php


if(isset($_POST['submit']))
{
$connect = mysqli_connect("localhost","root","","userdetails_webchat");

if($connect == false)
{
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$otp = $_POST['otp'];

$query = "SELECT verifykey FROM userdetails";

$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);

if($row['verifykey'] == $otp)
{
    header("Location: login.php");
    $otp = NULL;
}
else
{
    echo "Wrong OTP";
}
}

?>
</body>
</html>