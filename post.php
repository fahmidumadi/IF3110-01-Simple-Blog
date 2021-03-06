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
<?php
// Create connection
$con=mysqli_connect("localhost","root","","simple_blog");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$post_id=$_GET['post_id'];
$result = mysqli_query($con,"SELECT * FROM post WHERE id=$post_id");
$row = mysqli_fetch_array($result);

echo "<title>Dumadi's Blog | ".$row['judul']."</title>";
?>
</head>

<body class="default" onload="loadComment()">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    <header class="art-header">
        <div class="art-header-inner" >
            <time class="art-time">
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
            </time>
            <h2 class="art-title"><?php echo $row['judul']?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo str_replace("\n", "<br>", $row['konten'])?></p>
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form name="formKomen" method="post" action="#" onsubmit="return false;">
                    <input type="hidden" name="ID" id="ID" value="<?php echo $post_id?>">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button" onclick="insertComment()">
                </form>
            </div>
            
            <ul class="art-list-body">
                <div id="komentar_baru"></div>
                <div id="komentar"></div>
            </ul>
        </div>
    </div>

</article>
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
<script type="text/javascript" src="assets/js/comment.js"></script>
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