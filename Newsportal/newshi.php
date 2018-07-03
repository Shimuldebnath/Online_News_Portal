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
      <button onclick="this.innerHTML=Date()">Local Time</button>    
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
    <author><h3><b>HOME</b></h3></author>
    <news></news>
  </TITLE>
 </titlestore>

<canvas id="canvas" width="150" height="150"
style="background-color:#333">
</canvas>
<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
  </div>
 
  <div id="content">
    <h3>Headline Content</h3>

   <?xml version="1.0" encoding="UTF-8"?>
<titlestore>

  <TITLE> category="title">
    <title lang="en">title name</title>
    <author><h3><b>SPORTS</b></h3></author>
  </TITLE>
 </titlestore>
    

<?php
$post_id = $_GET['p_id'];

  $con=mysqli_connect('localhost','root','');

  if(!mysqli_connect("localhost","root",""))
  {
     die('not connected');
  }
  if(!mysqli_select_db($con,"dbtest"))
  {
     die('not connected');
  }
  $query = "SELECT * FROM help WHERE id='{$post_id}' ";
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
