<?php
$con=mysqli_connect('localhost','root','');
if(!mysqli_connect("localhost","root",""))
{
     die('not connected'.mysql_error());
}
if(!mysqli_select_db($con,"dbtest"))
{
     die('not connected'.mysql_error());
}
?>