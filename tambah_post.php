<?php
$con=mysqli_connect("localhost","root","","simple_blog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_POST['submit'] == 'Tambah'){
	$result = mysqli_query($con,"SELECT id FROM post ORDER BY id DESC LIMIT 1");
	$last_id = mysqli_fetch_array($result);
	// escape variables for security
	$judul = mysqli_real_escape_string($con, $_POST['Judul']);
	$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
	$konten = mysqli_real_escape_string($con, $_POST['Konten']);
	$id = $last_id['id']+1;
	$sql="INSERT INTO post (id, judul, tanggal, konten)
	VALUES ('$id','$judul', '$tanggal', '$konten')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
} 
else if($_POST['submit'] == 'Edit'){
	// escape variables for security
	$judul = mysqli_real_escape_string($con, $_POST['Judul']);
	$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
	$konten = mysqli_real_escape_string($con, $_POST['Konten']);
	$id = $_GET['post_id'];
	$sql="UPDATE post SET judul='$judul', tanggal='$tanggal', konten='$konten' 
	WHERE id=$id";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
}
mysqli_close($con);
header('Location: index.php');
?>