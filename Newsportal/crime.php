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
      <h2 style="background-color:#000000;color:white">
      <marquee>True News</marquee>
</h2>
     
      <script>
      function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>


<body onload="startTime()">

<div id="txt"></div>   
    </div>

    <div id="navcontainer">
      <ul id="navlist"> 
        <li ><a href="national.php">National</a></li>
      <li><a href="sports.php">Sports</a></li>
        <li><a href="international.php">International</a></li>
        <li><a href="crime.php">Crime</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="resister.php">Resister</a></li>
        
      </ul>
    </div>

  </div>
 
  <div id="content">
    
   <?xml version="1.0" encoding="UTF-8"?>
<titlestore>

  <TITLE> category="title">
    <title lang="en">title name</title>
    <author><h3><b>CRIME</b></h3></author>
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
  $query = "SELECT * FROM crime_news ORDER BY id desc";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)){

    $headline = $row['headline'];
    $content = substr($row['news'],0,300);
    $image = $row['image'];
    $post_id= $row['id'];

    ?>

    
    <h1><?php echo "$headline";?></h1>
    <p><?php echo "$content";?></p>
    <a href="newcrime.php?p_id=<?php echo "$post_id"?>"id="Read">Read More...</a>
    <img width="200" height="200" src="<?php echo "$image"; ?>">



 <?php } ?>
      
  </div>

</div>


<div id="shi">
<p>All right reserved by Shimul </p>
</div>

<h1></h1>
</body>
</html>
