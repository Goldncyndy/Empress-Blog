<?php
include_once('header.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<a href="#" id="top-open">Menu</a> </div>
      <!-- ENDS top-widget -->
      <div class="wrapper clearfix"> <a href="index.php" id="logo"><img src="img/empress_logo.png" alt="" width="200px" height="100px"></a>
        <nav>
          <ul id="nav" class="sf-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="page.php">About</a>
              <!-- <ul>
                <li><a href="#">Submenu</a></li>
                <li><a href="#">Submenu</a></li>
                <li><a href="#">Submenu</a></li>
              </ul> -->
            </li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li class="current-menu-item"><a href="contact.php">Contact Us</a></li>
          </ul>
          <div id="combo-holder"></div>
        </nav>
  </div>
</header>
<!-- MAIN -->
<div id="main">
  <div class="wrapper clearfix">
    <h2 class="page-heading"><span>Contact Us</span></h2>

     <!-- form -->
      <form id="contactForm" action="" method="post">
        <!-- <h2 class="heading">Contact us using this form</h2> -->
        <p> Reach out effortlessly and connect with us using this convenient contact form </p>
        <fieldset>
          <div>
            <input name="name"  id="name" type="text" class="form-poshytip" title="Enter your full name" required>
            <label>Name</label>
          </div>
          <div>
            <input name="email"  id="email" type="text" class="form-poshytip" title="Enter your email address" required>
            <label>Email</label>
          </div>
          <div>
            <input name="web"  id="web" type="text" class="form-poshytip" title="Enter your website">
            <label>Website</label>
          </div>
          <div>
            <textarea  name="comment"  id="comments" rows="5" cols="20" class="form-poshytip" title="Enter your comments"></textarea>
          </div>
          <p>
            <input type="submit" value="Send message" name="submit" id="submit">
            <span id="error" class="warning">Error Sending Message...</span>
          </p>
        </fieldset>
      </form>
      
      <!-- ENDS form -->
      <!-- contact sidebar -->
      <p id="msg" class="success">Form data sent!. Thanks for your contacting us, we will get back to you.</p>
      <aside id="contact-sidebar" style="background-color: #FF1493; color:white;">
        <div class="block">
          <h4 style=" color:white;">Address</h4>
          <p>8, Akpodiete Layout, Ughelli, Delta State, Nigeria.</p>
          <ul class="address-block">
            <li class="address">Address line, Delta state, ZIP - 333105</li>
            <li class="phone">+234-811-6832-220</li>
            <li class="mobile">+234-706-4292-081</li>
            <li class="email"><a href="#">soniajero@yahoo.com</a></li>
          </ul>
        </div>
      </aside>
      <div class="clearfix"></div>
      <!-- ENDS contact-sidebar -->
    </div>
    <!--  page content-->
  </div>
</div>
<!-- ENDS MAIN -->
<?php
include_once('footer.php');
?>
<!-- Start google map -->
<script>initialize();</script>
</body>
</html>

<?php
// Retrieve form data
if (isset($_POST["submit"])) {

    // Database connection details
    $conn = mysqli_connect("localhost", "root", "", "black_empress");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $web = mysqli_real_escape_string($conn, $_POST['web']);
    $web = isset($_POST['web']) ? mysqli_real_escape_string($conn, $_POST['web']) : "";
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Prepare and execute SQL query
    $sql = "INSERT INTO contact_info VALUES ('0', '$name', '$email', '$web', '$comment')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '
        <script type="text/javascript">
          function hideMsg()
          {
             document.getElementById("msg").style.visibility = "hidden";
          }

          document.getElementById("msg").style.visibility = "visible";
          window.setTimeout("hideMsg()", 2000);
        </script>';
        // header("Location: home.php?uploadsuccess");
        exit();
    } else {
        echo '
        <script type="text/javascript">
          function hideMsg()
          {
             document.getElementById("error").style.visibility = "hidden";
          }

          document.getElementById("error").style.visibility = "visible";
          window.setTimeout("hideMsg()", 2000);
        </script>';
    }

    // Close statement and connection
    $conn->close();
    // echo "Thank you for submitting the form!";
}
?>