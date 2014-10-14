<?php
$con=mysqli_connect("localhost","root","","simple_blog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_GET['post_id'];
$result = mysqli_query($con,"SELECT * FROM comment WHERE postID=$id ORDER BY tanggal DESC");
while ($row = mysqli_fetch_array($result)){
	echo '<li class="art-list-item">';
	echo     '<div class="art-list-item-title-and-time">';
	echo         '<h2 class="art-list-title">'.$row['nama'].'</a></h2>';
	echo         '<div class="art-list-time">'.$row['tanggal'].'</div>';
	echo     '</div>';
	echo     '<p>'.$row['komentar'].'</p>';
	echo '</li>';
}
mysqli_close($con);
?>