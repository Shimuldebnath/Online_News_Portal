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

 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
  
      function check(){
      // var author = document.getElementById('author').value;
      var comment = document.getElementById('comment').value;
      var post_id = document.getElementById('post_id').value;
      var dataString = '&comment='+comment + '&post_id='+post_id;
      $.ajax({
        type: "post",
        url: "comment.php",
        data: dataString, 
        cache:false,
         success:function(html){
           var form = document.getElementById('comment_box');
           form.reset();
           $('#msg').html(html); 

        }

      });
      return false;
    }

</script>



</head>
<body>
<div id="x">


  <div id="y">

    <div id="header">
      <h1>NewsPortal</h1> 
        
    </div>

    <div id="navcontainer">
      <ul id="navlist"> 
        <li ><a href="national.php">National</a></li>
      <li><a href="sports.php">Sports</a></li>
        <li><a href="international.php">International</a></li>
        <li><a href="crime.php">Crime</a></li>
        <li><a href="logout.php">logout</a></li>

        
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


  </div>
 
  <div id="content">
    <h3>Headline Content</h3>

   <?xml version="1.0" encoding="UTF-8"?>
<titlestore>

  <TITLE> category="title">
    <title lang="en">title name</title>
    <author><h3><b></b></h3></author>
  </TITLE>
 </titlestore>
    

<?php
$post_id = $_GET['p_id'];
$con=mysqli_connect('localhost','root','');

  if(!mysqli_connect("localhost","root",""))
  {
     die('not connected'.mysql_error());
  }
  if(!mysqli_select_db($con,"dbtest"))
  {
     die('not connected'.mysql_error());
  }
  $query = "SELECT * FROM home WHERE id='{$post_id}' ";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($query)){

    $headline = $row['headline'];
    $content = $row['news'];
    $image = $row['image'];
    $post_id= $row['id'];
    ?>

    
    <h1><?php echo "$headline";?></h1>
    <p><?php echo "$content";?></p>
    
    <img width="200" height="200" src="<?php echo "$image"; ?>">



 <?php } ?>


         <div class="well">
                    <form name="comment_form" id="comment_box">
                        <div class="form-group">
                           
                             <textarea class="comment" rows="3" cols="80" placeholder="Your comment" id="comment"></textarea>
                        </div>
                        <br></br>
                         <button type="submit" class="btn btn-primary" id="b1"  onclick="return check()">Comment</button>
                        <input type="hidden" id="post_id" value="<?php echo "$post_id"; ?>"><br><br>                    
                      <h4>Comment:</h2>
                    </form>
               

                </div>



                  <p id="msg" class="c1"></p>

                <?php 
    $connection=mysqli_connect('localhost','root','','news');            
    $query = "SELECT * FROM comment WHERE comment_post_id ='{$post_id}' ";
    $catagories_query = mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($catagories_query)){
      $post_content = $row['comment_content'];
      $post_author = $row['comment_author'];
      ?>

      <div id="post">
      <p class="c1"><?php  echo "$post_author : "; echo "$post_content";  ?></p>
      
    </div>

    <?php } ?>
      
  
</div>

<div id="footer">
<p>All right reserved by Shimul </p>

</div>

<h1></h1>
</body>
</html>
