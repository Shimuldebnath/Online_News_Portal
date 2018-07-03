<?php
session_start();
include_once 'dbconnect.php';

if(isset($_COOKIE['user'])!="")
{
 header("Location: home.php");
}

if(isset($_SESSION['id'] )!="")
{
 header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
 $email = mysqli_real_escape_string($con,$_POST['email']);
 $upass = mysqli_real_escape_string($con,$_POST['password']);
 $query="SELECT * FROM users WHERE email='$email'";
 $res=mysqli_query($con,$query);
 $row=mysqli_fetch_array($res);
 
if($email =='admin@gmail.com' && $upass =='admin'){
  $_SESSION['admin']=$email;
  header('Location: admin.php');
}

 else if($row['password']==md5($upass))
 { 
  $_SESSION['id'] = $email;
  if (isset($_POST['rem'])) {
    setcookie('username', $email, time()+(15),"/");
  }
  header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login System</title>
<link rel="stylesheet" href="style3.css" type="text/css" />
<link href="css/style2.css" type="text/css" rel="stylesheet" />


</head>
<body>
<div id="color">
<center>

<div id="login-form">
<center>
<form method="post">
<table align="center" width="40%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /><br><br></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><input type="checkbox" name="rem"><span>Keep me logged in</span></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="resister.php">Sign Up </a></td>
</tr>
<tr>
<td><a href="index.php">Back To home </a></td>
</tr>
</table>
</form>

</center>
 
  </div>
</div>

</body>
</html>