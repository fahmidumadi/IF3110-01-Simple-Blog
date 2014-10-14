<?php
$con=mysqli_connect("localhost","root","","simple_blog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_GET['post_id'];
$sql="DELETE FROM post WHERE id=$id";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header('Location: index.php');
?>