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
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Tambah Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
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
        $date = $row['tanggal'];
        list($year,$month,$day) = split("-", $date);
        $newdate = $day."/".$month."/".$year;
    ?>
    <header class="art-header">
        <div class="art-header-inner" >
            <h2 class="art-title" style="font-size:50px">Edit Post</h2>
        </div>
    </header>
    <div class="art-body">
        <div class="art-body-inner">

            <div id="contact-area">
                <form name="formedit" method="post" action="tambah_post.php?post_id=<?php echo $post_id?>" onsubmit="return checkDate()">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php echo $row['judul'] ?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" value="<?php echo $newdate ?>" placeholder="DD/MM/YYYY">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten" ><?php echo $row['konten'] ?></textarea>

                    <input type="submit" name="submit" value="Edit" class="submit-button">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function IsKabisat(yy){
        if(((yy % 4 == 0) && (yy % 100 != 0)) || (yy % 400 == 0))
            return true;
        else return false;
    }
    function checkDate(){
        var EnteredDate = document.getElementById("Tanggal").value;
        var date = EnteredDate.substring(0,2);
        var month = EnteredDate.substring(3,5);
        var year = EnteredDate.substring(6,10);
        var IsValid = false;
        if((year>1000) && (month>0) && (month<=12) && (date>0)){
            if(month==2){
                if(IsKabisat(year) && (date <= 29)){
                    IsValid = true;
                }
                else if(!IsKabisat(year) && (date <=28)){
                    IsValid = true;
                }
            }
            else if(((month==1)||(month==3)||(month==5)||(month==7)||(month==8)||(month==10)||(month==12)) &&(date <=31)){
                IsValid = true;
            }
            else if (date<=30){
                IsValid = true;
            }
        }
        if(IsValid){
            var myDate= new Date(year, month-1, date);
            var today = new Date();
            today.setDate(today.getDate()-1);

            if(myDate<today){
                alert("Tanggal yang dimasukkan sudah terlewat");
                return false;
            }
            else{
                document.formedit.Tanggal.value=year+"-"+month+"-"+date;
            }    
        }
        else{
            alert("Tanggal yang dimasukkan tidak valid");
            return false;
        }
    }   
    </script>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>


<!-- <script type="text/javascript" src="assets/js/fittext.js"></script> -->
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