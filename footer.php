<?php
$conn = mysqli_connect("localhost", "root", "", "black_empress");
		
// Check connection
if($conn === false){
  die("ERROR: Connection error. "
    . mysqli_connect_error());
}
// $query = "select * from blog_content";
// $result = mysqli_query($conn,$query);

// $query2 = "select * from socials";
// $res = mysqli_query($conn,$query2);

// Prepare and execute SQL query to retrieve the three most recent rows
$sql = "SELECT * FROM blog_content ORDER BY id DESC LIMIT 2";
$result = $conn->query($sql);

$query = "SELECT * FROM socials ORDER BY id DESC LIMIT 2";
$result2 = $conn->query($query);
 
    
?>
<footer>
    <div class="wrapper">
      <ul  class="widget-cols clearfix">
        <li class="first-col">
          <div class="widget-block">
            <h4>Recent posts</h4>
              <?php
                          // LOOP TILL END OF DATA
               if (mysqli_num_rows($result) > 0) {
                  while($rows = mysqli_fetch_assoc($result)) {
                    $date = date('F j, Y', strtotime($rows['date']));

               ?>
            <div class="recent-post"> <a href="#" class="thumb"><img src="img/Black Empress.png" alt="" width="50" height="50" ></a>
            <div class="post-head"> <a href="#"><?php echo $rows['topic']; ?></a><span> <?php echo $date; ?></span> </div>
            </div>
            <?php
             }
               }
           ?>
          </div>
        </li>
        <li class="second-col">
          <div class="widget-block">
            <h4>Black Empress Daily</h4>
            <p>Welcome to our website! Sign up for our newsletters to stay updated and find our website useful. 
              Join today for valuable content and exclusive offers. 
              Thank you for visiting!</p>
          </div>
        </li>
        <li class="third-col">
          <div class="widget-block">
            <div id="tweets" class="footer-col tweet">
              <h4>Our Socials</h4>
              <ul class="tweet_list">
              <?php
                          // LOOP TILL END OF DATA
               if (mysqli_num_rows($result2) > 0) {
                  while($rows = mysqli_fetch_assoc($result2)) {
                    $timestamp = strtotime($rows['time']);
                    $formattedTime = date('F j, g:i A', $timestamp);
               ?>
                <li class="tweet_first tweet_odd"><span class="tweet_time"><a href="#"><?php echo $formattedTime; ?></a></span> <span class="tweet_text"><?php echo $rows['comment']; ?> <a href="<?php echo $rows['link']; ?>">domain.com</a></span></li>
                <?php
             }
               }
           ?>
              </ul>
            </div>
          </div>
        </li>
        <li class="fourth-col">
          <div class="widget-block">
            <h4>We Inspire</h4>
            <p>Unlock the power within and follow our page to embark on a journey of inspiration, growth, and endless possibilities.</p>
          </div>
        </li>
      </ul>
      <div class="footer-bottom">
        <div class="left">&copy; Copyright 2023 <a href="#">Black Empress Daily</a> All Rights Reserved </a></div>
        <div class="right">
        <ul id="social-bar">
            <li><a href="https://web.facebook.com/Soniajero?mibextid=ZbWKwL&_rdc=1&_rdr" title="Become a fan" class="poshytip"><img src="img/social/facebook.png" alt=""></a></li>
            <li><a href="https://twitter.com/OhwojeroSonia?t=C1GgXGc2c3OjRdCSNdYx0Q&s=09" title="Follow my tweets" class="poshytip"><img src="img/social/twitter.png" alt=""></a></li>
            <li><a href="https://www.instagram.com/ohwojerosonia/?igshid=ZGUzMzM3NWJiOQ%3D%3D" title="Follow me on Instagram" class="poshytip"><img src="img/social/plus.png" alt=""></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

 