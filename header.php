<!doctype html>
<html class="no-js" lang="en">
<head>
<title>Black Empress</title>
<meta charset="utf-8">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
<link rel="stylesheet" media="all" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- JS -->
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/css3-mediaqueries.js"></script>
<script src="js/custom.js"></script>
<script src="js/tabs.js"></script>
<!-- Tweet -->
<link rel="stylesheet" href="css/jquery.tweet.css" media="all">
<!-- ENDS Tweet -->
<!-- superfish -->
<link rel="stylesheet" media="screen" href="css/superfish.css">
<script src="js/superfish-1.4.8/js/hoverIntent.js"></script>
<script src="js/superfish-1.4.8/js/superfish.js"></script>
<script src="js/superfish-1.4.8/js/supersubs.js"></script>
<!-- ENDS superfish -->
<!-- prettyPhoto -->
<script src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css"  media="screen">
<!-- ENDS prettyPhoto -->
<!-- poshytip -->
<link rel="stylesheet" href="js/poshytip-1.1/src/tip-twitter/tip-twitter.css">
<link rel="stylesheet" href="js/poshytip-1.1/src/tip-yellowsimple/tip-yellowsimple.css">
<script src="js/poshytip-1.1/src/jquery.poshytip.min.js"></script>
<!-- ENDS poshytip -->
<!-- GOOGLE FONTS -->
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>
<!-- Flex Slider -->
<link rel="stylesheet" href="css/flexslider.css">
<script src="js/jquery.flexslider-min.js"></script>
<!-- ENDS Flex Slider -->
<!-- Less framework -->
<link rel="stylesheet" media="all" href="css/lessframework.css">
<!-- modernizr -->
<script src="js/modernizr.js"></script>
<!-- SKIN -->
<link rel="stylesheet" media="all" href="css/skin.css">

<style>
  body {
        margin: 0; /* Remove default body margin */
    }
 .home-block {
    text-align: center;
  }

  #form1 {
    display: inline-flex;
    align-items: center;
    margin-bottom: 40px;
  }

  input[type="email"] {
    width: 380px;
    height: 40px;
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  button[type="submit"] {
    height: 40px;
    padding: 0 15px;
    background-color: pink;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  #msg {
    background-color: lightgreen;
    visibility: hidden;
  }

  #error {
    visibility: hidden;
  }

 
    
</style>
<?php
$conn = mysqli_connect("localhost", "root", "", "black_empress");
		
// Check connection
if($conn === false){
  die("ERROR: Connection error. "
    . mysqli_connect_error());
}

$query = "SELECT * FROM blog_content ORDER BY id DESC LIMIT 12";
$result = $conn->query($query);

$query2 = "SELECT * FROM projects ORDER BY id DESC LIMIT 6";
$result2 = $conn->query($query2);
?>

</head>
<body>
    <header class="clearfix">
      <!-- top widget -->
      <div id="top-widget-holder">
        <!-- <div class="wrapper"> !-->
      <!-- ENDS top-widget -->
      <!-- <div class="wrapper clearfix"> <a href="index.php" id="logo"><img  src="img/empress_logo.png" alt="" width="250" height="150"></a>
        <nav>
          <ul id="nav" class="sf-menu">
            <li class="current-menu-item"><a href="index.php">HOME</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="page.php">ABOUT</a>
              <ul>
                <li><a href="#">Submenu</a></li>
                <li><a href="#">Submenu</a></li>
                <li><a href="#">Submenu</a></li>
              </ul>
            </li>
            <li><a href="portfolio.php">PORTFOLIO</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>
          <div id="combo-holder"></div>
        </nav> -->
      <!-- </div>
    </header> -->