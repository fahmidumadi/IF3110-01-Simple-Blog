<?php
$con=mysqli_connect("localhost","root","","simple_blog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_POST['post_id'];
date_default_timezone_set("Asia/Jakarta");
// escape variables for security
$nama = mysqli_real_escape_string($con, $_POST['Nama']);
$email = mysqli_real_escape_string($con, $_POST['Email']);
$komentar = mysqli_real_escape_string($con, $_POST['Komentar']);
$date_now = date("Y-m-d H:i:s");    
$sql="INSERT INTO comment (postID, nama, email, tanggal, komentar)
	VALUES ('$id','$nama','$email','$date_now', '$komentar')";
if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
}

$result = mysqli_query($con,"SELECT * FROM comment WHERE postID=$id ORDER BY tanggal DESC LIMIT 1");
$row = mysqli_fetch_array($result);
echo '<li class="art-list-item">';
echo     '<div class="art-list-item-title-and-time">';
echo         '<h2 class="art-list-title">'.$row['nama'].'</a></h2>';
echo         '<div class="art-list-time">'.$row['tanggal'].'</div>';
echo     '</div>';
echo     '<p>'.$row['komentar'].'</p>';
echo '</li>';


mysqli_close($con);
?>