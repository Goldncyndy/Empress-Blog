
<?php
include_once('header.php');

// Fetch data from the 'blog' table
$query = "SELECT * FROM blog_content ORDER BY id DESC LIMIT 12";
$result = mysqli_query($conn, $query);

?>
<a href="#" id="top-open">Menu</a> </div>
      <!-- ENDS top-widget -->
      <div class="wrapper clearfix"> <a href="index.php" id="logo"><img  src="img/empress_logo.png" alt="" width="200px" height="100px"></a>
        <nav>
          <ul id="nav" class="sf-menu">
            <li class="current-menu-item"><a href="index.php">Home</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="page.php">About</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
          <div id="combo-holder"></div>
        </nav>
  </div>
</header>
<!-- MAIN -->
<div id="main">
  <div class="wrapper">
    <!-- slider holder -->
    <div id="slider-holder" class="clearfix">
      <!-- slider -->
      <div class="flexslider home-slider">
        <ul class="slides">
        <li> <img src="img/slides/banner3.jpg" alt="" style="width: 100%; height: 100%;"> </li>
          <li> <img src="img/slides/Black Empress-2.png" alt="" style="width: 100%; height: 100%;"> </li>
          <li> <img src="img/slides/sonia2.jpg" alt="" style="width: 100%; height: 100%;">
            <p class="flex-caption">Black Empress Daily Newsletters</p>
          </li>
          <li> <img src="img/slides/sonia.jpg" alt="" style="width: 100%; height: 8%;"> </li>
        </ul>
      </div>
      <!-- ENDS slider -->
      <div class="home-slider-clearfix "></div>
      <!-- Headline -->
      <div id="headline" style="background-color: #FF1493; color:white;">
        <h1 style=" color:white;" >Black Empress Daily Newsletters</h1>
        <p style=" color:white;">Introducing "Black Empress Daily Newsletters" -
          Unleash the power of knowledge with our daily insights,
          Delivering news that amplifies the voices of black excellence,
          Stay informed, empowered, and inspired every single day,
          Join our community and embrace the essence of black empowerment </p>
        <p style=" color:white;">Stay tuned!</p>
        <em id="corner"></em> </div>
      <!-- ENDS headline -->
    </div>
    <!-- ENDS slider holder -->
    <!-- home-block -->
  <div class="home-block">
    <h2 class="home-block-heading"><span>FEATURED POSTS</span></h2>
    <div class="one-third-thumbs clearfix">
    <figure>
      <figcaption>
        <strong>Black Empress Daily</strong>
        <span>Relationship Controversies</span>
        <em>May 01, 2023</em>
        <br>
        <h6 class="post-heading"><a href="">Read more</a></h6> <a href="" class="opener"></a>
      </figcaption>
      <a href="" class="thumb"><img src="img/dummies/featured-3.jpg" alt=""></a>
      <!-- <br>
      <br> -->
     </figure>
    <figure>
      <figcaption>
        <strong>Black Empress Daily</strong>
        <span>Bola Tinubu soon to become president of Nigeria. </span>
        <em>May 08, 2023</em>
        <br>
        <h6 class="post-heading"><a href="">Read more</a></h6>
        <a href="" class="opener"></a>
      </figcaption>
      <a href="" class="thumb"><img src="img/dummies/featured-4.jpg" alt=""></a>
      <!-- <br>
      <br> -->
     </figure>
    <figure class="last">
      <figcaption>
        <strong>Black Empress Daily</strong>
        <span>Happy Children's Day to all children all over the world. The future of tomorrow.</span>
        <em>May 27, 2023</em>
        <br>
        <h6 class="post-heading"><a href="">Read more</a></h6>
        <a href="" class="opener"></a>
      </figcaption>
      <a href="" class="thumb"><img src="img/dummies/featured-5.jpg" alt=""></a>
      <!-- <br>
      <br> -->
    </figure>
   
     
<?php
    // Check if any rows are returned
if (mysqli_num_rows($result) > 0) {
  // echo '<div class="one-third-thumbs clearfix">';
  $counter = 0;
  // Fetch each row of data
  while ($row = mysqli_fetch_assoc($result)) {
    $_GET['id'] = $row['id'];
      $title = $row['topic'];
      $category = $row['category'];
      $date = $row['date'];
      $image = $row['image'];
      $des = $row['blog-content'];
      // $link = $row['link'];

      if ($counter % 3 == 0) {
        echo '<figure class="last" style="margin-right: 13px; margin-left: auto;">';
      } else {
        echo '<figure>';
      }
  
      echo '<figcaption>
              <strong>' . $title . '</strong>
              <span>' . $category . '</span>
              <em>' . $date . '</em>
              <h6 class="post-heading"><a href="single.php?id=' . $row['id'] . '">' . $des . ' Read more</a></h6>
              <a href="single.php?id=' . $row['id'] . '" class="opener"></a>
            </figcaption>
            <a href="single.php?id=' . $row['id'] . '" class="thumb"><img src="black-empress-admin/pages/' . $image . '" alt="" style="width: 300px; height: 200px;"></a>
          </figure>'; 
    }
  
    // echo '</div>';
  } else {
    echo "No items found.";
  }
?>
</div>
</div>
    <!-- ENDS home-block -->
    <!----- News Letter block --------->
    <div class="home-block">
      <h2 class="home-block-heading"><span>Sign Up for Newsletters</span></h2>
      <div class="one-two-thumbs clearfix">
      <form id="form1" action="#" method="post">
        <!-- <label for="email">Email Address:</label> -->
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        <button type="submit" name="submit" id="submit">Sign Up</button>
        <!-- <input type="button" value="Send" name="submit" id="submit"> -->
      </form>
      </div>
    </div>
    <!------ End of Newsletter block ---------->
    <!-- home-block -->
    <div class="home-block">
      <h2 class="home-block-heading"><span>LATEST PROJECTS</span></h2>
        <?php

        // Check if any rows are returned
if (mysqli_num_rows($result2) > 0) {
  echo '<div class="one-fourth-thumbs clearfix">';

  // Fetch each row of data
  while ($row = mysqli_fetch_assoc($result2)) {
      $title = $row['project_name'];
      $description = $row['description'];
      $date = $row['date'];
      $image = $row['image'];

      // Output the HTML for each item
      echo '<figure>';
      echo '<figcaption>';
      echo '<strong>' . $title . '</strong>';
      echo '<span>' . $description . '</span>';
      echo '<em>' . $date . '</em>';
      echo '<a href="project.php?id=' . $row['id'] . '" class="opener"></a>';
      echo '</figcaption>';
      echo '<a href="project.php?id=' . $row['id'] . '" class="thumb"><img src="black-empress-admin/pages/' . $image . '" alt="" style="width: 250px; height: 130px;"></a>';
      echo '</figure>';
  }

  echo '</div>';
} else {
  echo "No items found.";
}

// Close the database connection
// mysqli_close($conn);
?>
        <a href="blog.php" class="more-link right">More projects &#8594;</a> 
      </div>
    </div>
    <!-- ENDS home-block -->
  </div>
</div>
<!-- ENDS MAIN -->
<?php
include('footer.php');
?>
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

    $today = date("Y-m-d");
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Prepare and execute SQL query
    $sql = "INSERT INTO newsletter VALUES ('0', '$email', '$today')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'success!';
    }
    // Close statement and connection
    $conn->close();
    // echo "Thank you for submitting the form!";
}
?>

