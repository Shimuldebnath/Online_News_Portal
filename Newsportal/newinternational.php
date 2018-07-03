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
         
    </div>

    <div id="navcontainer">
      <ul id="navlist"> 
        <li ><a href=national.php>National</a></li>
      <li><a href="sports.php">Sports</a></li>
        <li><a href="international.php">International</a></li>
        <li><a href=crime.php>Crime</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="resister.php">Resister</a></li>
        
      </ul>
    </div>

  </div>
  <div id="left_side">
  <h1>left side</h1>
     <?xml version="1.0" encoding="UTF-8"?>
<titlestore>

  <TITLE> category="title">
    <title lang="en">title name</title>
    <author><h3><b></b></h3></author>
    <news></news>
  </TITLE>
 </titlestore>

<canvas id="canvas" width="0" height="0"
style="background-color:#333">
</canvas>

  </div>
 
  <div id="content">
    

   <?xml version="1.0" encoding="UTF-8"?>
<titlestore>

  <TITLE> category="title">
    <title lang="en">title name</title>
    <author><h3><b>International</b></h3></author>
  </TITLE>
 </titlestore>
    

<?php
$con=mysqli_connect('localhost','root','');
$post_id = $_GET['p_id'];

  if(!mysqli_connect("localhost","root",""))
  {
     die('not connected'.mysql_error());
  }
  if(!mysqli_select_db($con,"dbtest"))
  {
     die('not connected'.mysql_error());
  }
  $query = "SELECT * FROM international_news WHERE id='{$post_id}' ";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)){

    $headline = $row['headline'];
    $content = $row['news'];
    $image = $row['image'];
    $post_id= $row['id'];
    

    ?>

    
    <h1><?php echo "$headline";?></h1>
    <p><?php echo "$content";?></p>
    
    <img width="200" height="200" src="<?php echo "$image"; ?>">



 <?php } ?>
      
  
</div>

<div id="footer">
<p>All right reserved by Shimul </p>

</div>

<h1></h1>
</body>
</html>
