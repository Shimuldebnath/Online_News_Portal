<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['id']) && !isset($_COOKIE['user'])){
	header('Location: login.php');
}
?>

<?php

include_once 'dbconnect.php';

if(!isset($_SESSION['id']))
{
 header("Location: login.php");
}

$res=mysqli_query($con,"SELECT * FROM users WHERE id=".$_SESSION['id']);

?>

<!DOCTYPE html>
<html>
<head>

<title>NewsPortal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="x">


  <div id="y">

    <div id="header">
      <h1>NewsPortal</h1> 
      <h2 style="background-color:#0000FF">
      <marquee>True News</marquee>
</h2>
    </div>

    <div id="navcontainer">
      <ul id="navlist"> 
        <li ><a href="national.php">National</a></li>
      <li><a href="sports.php">Sports</a></li>
        <li><a href="international.php">International</a></li>
        <li><a href="crime.php">Crime</a></li>
        <li><a href="logout.php">Logout</a></li>
        
        
      </ul>
    </div>

  </div>
 
  <div id="content">
    
   <?xml version="1.0" encoding="UTF-8"?>
<titlestore>

  <TITLE> category="title">
    <title lang="en">title name</title>
    <author><h3><b></b></h3></author>
  </TITLE>
 </titlestore> 

<?php
  $con=mysqli_connect("localhost","root","");
  if(!mysqli_connect("localhost","root",""))
  {
     die('not connected'.mysql_error());
  }
  if(!mysqli_select_db($con,"dbtest"))
  {
     die('not connected'.mysql_error());
  }
  $query = "SELECT * FROM home ORDER BY id desc";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)){

    $headline = $row['headline'];
    $content = substr($row['news'],0,300);
    $image = $row['image'];
    $post_id= $row['id'];

    ?>

    
    <h1><?php echo "$headline";?></h1>
    <p><?php echo "$content";?></p>
    <a href="newhome.php?p_id=<?php echo "$post_id"?>"id="Read">Read More...</a>
    <img width="200" height="200" src="<?php echo "$image"; ?>">



 <?php } ?>
      
  </div>


</div>


<div id="home">
<p>All right reserved by Shimul </p>
</div>

<h1></h1>
</body>
</html>
