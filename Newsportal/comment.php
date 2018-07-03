	<?php 

		error_reporting(0);
		session_start();
		ob_start();

		$connection=mysqli_connect('localhost','root','','news');
		$comment = $_POST['comment'];
		$post_id =$_POST['post_id'];
		$comment_author = $_SESSION['id'];
		$query = "INSERT INTO comment(comment_post_id,comment_content,comment_author) VALUES('$post_id','$comment','$comment_author')";
		$result = mysqli_query($connection,$query);
		echo $comment_author.":".$comment;
	?>
