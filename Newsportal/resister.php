<?php
session_start();
if(isset($_COOKIE['user'])!="")
{
 header("Location: home.php");
}
if(isset($_SESSION['id'] )!="")
{
 header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
 $uname = mysqli_real_escape_string($con,$_POST['username']);
 $email = mysqli_real_escape_string($con,$_POST['email']);
 $upass = md5(mysqli_real_escape_string($con,$_POST['password']));

 $_SESSION['id'] = $uname;
 $query="INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')";
 
 if(mysqli_query($con,$query))
 {
  ?>
        <script>alert('successfully registered ');</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
}
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Registration System</title>
<link rel="stylesheet" href="style3.css" type="text/css" />
<link href="css/style2.css" type="text/css" rel="stylesheet" />

</head>
<body>

<div id="color">

<script>  
function validateemail()  
{  
var x=document.myform.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
  return false;  
  }  
}  
</script>



<center>

<div id="login-form">

<form name="myform" method="post" action="#" onsubmit="return validateemail();">
<center>
<table align="center" width="40%" border="0">
<tr>
<td><input type="text" name="username" autocomplete="off" placeholder="username" id="txt1" onkeyup="showHint(this.value)" required/></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="login.php">Sign In Here</a></td>
</tr>
<tr>
<td><a href="index.php">Back to home</a></td>
</tr>
</table>

</form>
</center>
</div>
</div>


</body>
</html