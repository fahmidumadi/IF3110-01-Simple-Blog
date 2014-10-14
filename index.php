<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico"/>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Dumadi's Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>
<?php
  // Create connection
  $con=mysqli_connect("localhost","root","","simple_blog");
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT * FROM post ORDER BY tanggal DESC");
?>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <!-- Looping Post -->
            <?php
              while($row = mysqli_fetch_array($result)){
            ?>
              <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="post.php?post_id=<?php echo $row['id']?>"><?php echo $row['judul']?></a></h2>
                    <div class="art-list-time">
                      <?php 
                        $date = $row['tanggal'];
                        list($year,$month,$day) = split("-", $date);
                        echo $day;
                        switch($month){
                          case "1":
                            echo " Januari "; break;
                          case "2":
                            echo " Februari "; break;
                          case "3":
                            echo " Maret "; break;
                          case "4":
                            echo " April "; break;
                          case "5":
                            echo " Mei "; break;
                          case "6":
                            echo " Juni "; break;
                          case "7":
                            echo " Juli "; break;
                          case "8":
                            echo " Agustus "; break;
                          case "9":
                            echo " September "; break;
                          case "10":
                            echo " Oktober "; break;
                          case "11":
                            echo " Nopember "; break;
                          case "12":
                            echo " Desember "; break;
                        }
                        echo $year;
                      ?>
                    </div>
                </div>
                <p> <?php
                      $string = strip_tags($row['konten']);
                      if (strlen($string) > 100) {
                        // truncate string
                        $stringCut = substr($string, 0, 100);

                        // make sure it ends in a word so assassinate doesn't become ass...
                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="post.php?post_id='.$row['id'].'">read more</a>'; 
                      }
                      echo str_replace("\n", "<br>", $string)
                    ?>
                </p>
                <p>
                  <a href="edit_post.php?post_id=<?php echo $row['id']?>">Edit</a> | <a href="delete_post.php?post_id=<?php echo $row['id']?>" onclick="return confirm('Apakah anda yakin ingin menghapus post ini?')">Hapus</a>
                </p>
              </li>
            <?php
              }
            ?>
          </ul>
        </nav>
    </div>
</div>
<!-- Close connection -->
<?php
  mysqli_close($con);
?>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        <a class="twitter-link" href="http://twitter.com/fdumadi">Fahmi Dumadi</a>
        <br>13512047
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>

</body>
</html>