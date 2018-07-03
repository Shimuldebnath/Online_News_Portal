<?php 
	session_start();
	if(!isset($_SESSION['admin']))
	{
	    header('Location: login.php');
	}
?>

<?php 
	include_once 'dbconnect.php';
  
  if (isset($_POST['submit'])) {
    
    $headline = $_POST['headline'];
    $news = $_POST['news'];
    
    $file = $_POST['file'];
    

    if($headline && $news && file){
      $connection=mysqli_connect('localhost','root','');
    
      $query = "INSERT INTO national_news(headline,news,image) VALUES('$headline','$news','$file')";

      $result = mysqli_query($connection,$query);
      echo "Insert successfully.";
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.admin{

			margin-top: 200px;
			margin-bottom: 200px;
			margin-right: 500px;
			margin-left: 500px;
		}
	</style>

	 

</head>

<body style="background-color:black;">
	
		<form action="admin.php" method="POST"  class="admin">
	        	<h2>Insert into database.</h2>
	        	 <input type="text" name="headline" placeholder="Headline" required><br><br>
	        	 <input type="text" name="news" placeholder="News" required><br><br>
	       
	        	 <input type="file" name="file" required><br></br>
	                     
	        	<input type="submit" name="submit" class="sign-up-button">
	        	<!-- <input type="hidden">-->
	        	<br></br>
	        	<a href="logout.php"> logout here</a>
	    </form>

    
</body>
</html>