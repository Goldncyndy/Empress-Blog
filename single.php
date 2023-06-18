<?php
include_once('header.php');

$postId = $_GET['id']; // Assuming the post ID is passed in the URL parameter
$query3 = "SELECT * FROM blog_content WHERE id = " . $postId;
$result3 = $conn->query($query3);
// var_dump($conn);
// var_dump($query3);

if ($result3 && mysqli_num_rows($result3) > 0) {
    $postData = mysqli_fetch_assoc($result3);
    mysqli_free_result($result3);

    $commentsQuery = "SELECT * FROM comments WHERE post_id = $postId";
    $commentsResult = $conn->query($commentsQuery);

    // Prepare an array to store the comments
    $comments = [];

    if ($commentsResult && mysqli_num_rows($commentsResult) > 0) {
        while ($commentData = mysqli_fetch_assoc($commentsResult)) {
            // Add each comment to the comments array
            $comments[] = $commentData;
        }
        mysqli_free_result($commentsResult);
    }
}
    
?>

<a href="#" id="top-open">Menu</a>
</div>
<!-- ENDS top-widget -->
<div class="wrapper clearfix">
  <a href="index.php" id="logo"><img  src="img/empress_logo.png" alt="" width="200px" height="100px"></a>
  <nav>
    <ul id="nav" class="sf-menu">
      <li><a href="index.php">Home</a></li>
      <li class="current-menu-item"><a href="blog.php">Blog</a></li>
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
  <div class="wrapper clearfix">
    <!-- posts list -->
    <div id="posts-list" class="single-post">
      <h2 class="page-heading"><span>BLOG</span></h2>
      <article class="format-standard">

  <div class="entry-date">
  <div class="number"><?php echo date('d', strtotime($postData['date'])); ?></div>
  <div class="year"><?php echo date('M, Y', strtotime($postData['date'])); ?></div>
</div>
<div class="feature-image"> 
  <a href="" data-rel="prettyPhoto">
    <img src="black-empress-admin/pages/<?php echo $postData['image']; ?>" alt="" width="100%" height="30%">
  </a> 
</div>
<h2 class="post-heading">
  <a href=""><?php echo $postData['topic']; ?></a>
</h2>
<div class="post-content">
  <?php echo $postData['blog-content']; ?>
</div>
<div class="meta">
  <div class="categories">In 
    <?php 
    // foreach ($postData['category'] as $category): 
    ?>
      <a href="#"><?php echo $postData['category']; ?></a>
    <?php 
  // endforeach; ?>
  </div>
  <div class="comments">
    <a href="#"><?php echo count($comments); ?> comments</a>
  </div>
  <div class="user">
    <a href="page.php">By Black Empress</a>
  </div>
</div>

<!-- Comments list -->
<div id="comments-wrap">
  <h3 class="heading"><?php echo count($comments); ?> COMMENTS</h3>
  <ol class="commentlist">
    <?php foreach ($comments as $comment): ?>
      <li class="comment even thread-even depth-1" id="li-comment-<?php echo $comment['id']; ?>">
        <div id="comment-<?php echo $comment['id']; ?>" class="comment-body clearfix">
          <img alt="" src="img/gravatar.jpg" class="avatar avatar-35 photo" height="35" width="35">
          <div class="comment-author vcard"><?php echo $comment['name']; ?></div>
          <div class="comment-meta commentmetadata">
            <span class="comment-date"><?php echo $comment['date']; ?></span>
            <span class="comment-reply-link-wrap">
              <a class="comment-reply-link" href="#respond">Reply</a>
            </span>
          </div>
          <div class="comment-inner">
            <p><?php echo $comment['comment']; ?></p>
          </div>
        </div>
        <?php if (!empty($comment['childComments'])): ?>
          <!-- Child comments -->
          <ul class="children">
            <?php foreach ($comment['childComments'] as $childComment): ?>
              <li class="comment even alt depth-2" id="li-comment-<?php echo $childComment['id']; ?>">
                <div id="comment-<?php echo $childComment['id']; ?>" class="comment-body clearfix">
                  <img alt="" src="img/gravatar.jpg" class="avatar avatar-35 photo" height="35" width="35">
                  <div class="comment-author vcard"><?php echo $childComment['name']; ?></div>
                  <div class="comment-meta commentmetadata">
                    <span class="comment-date"><?php echo $childComment['date']; ?></span>
                    <span class="comment-reply-link-wrap">
                      <a class="comment-reply-link" href="#respond">Reply</a>
                    </span>
                  </div>
                  <div class="comment-inner">
                    <p><?php echo $childComment['comment']; ?></p>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
          <!-- ENDS child comments -->
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</div>
        <!-- ENDS comments list -->
        <!-- Respond -->
        <div id="respond">
          <div class="cancel-comment-reply"><a id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></div>
          <form action="" method="post" id="commentform">
            <h3 class="heading">LEAVE A REPLY</h3>
            <input type="text" name="author" id="author" value="" tabindex="1" required>
            <label for="author">Name <small>*</small></label>
            <br/>
            <input type="text" name="email" id="email" value="" tabindex="2">
            <label for="email">Email <small>*</small> <span>(not published)</span></label>
            <br>
            <textarea name="comment" id="comment"  tabindex="4"></textarea>
            <p>
              <input name="submit" type="submit" id="submit" tabindex="5" value="Post">
            </p>
          </form>
        </div>
        <div class="clearfix"></div>
        <!-- ENDS Respond -->
      </article>
    </div>
    <!-- ENDS posts list -->
    <!-- sidebar -->
    <aside id="sidebar" style="background-color: #FF1493;">
      <ul>
        <li class="block">
          <h4>CATEGORIES</h4>
          <ul>
        <li class="cat-item"><a href="blog.php?category=politics">Politics</a></li>
        <li class="cat-item"><a href="blog.php?category=beauty-fashion">Beauty &amp; Fashion</a></li>
        <li class="cat-item"><a href="blog.php?category=entertainment">Entertainment</a></li>
        <li class="cat-item"><a href="blog.php?category=education">Education</a></li>
        <li class="cat-item"><a href="blog.php?category=job-market">Job Market today</a></li>
        <li class="cat-item"><a href="blog.php?category=food-drink-hospitality">Food, Drink &amp; Hospitality</a></li>
        <li class="cat-item"><a href="blog.php?category=lifestyle">Lifestyle</a></li>
        <li class="cat-item"><a href="blog.php?category=job-opportunities">Job Opportunities</a></li>
      </ul>
        </li>
        <li class="block">
          <h4>ARCHIVES</h4>
          <ul>
            <li class="cat-item"><a href="#">January</a></li>
            <li class="cat-item"><a href="#">February</a></li>
            <li class="cat-item"><a href="#">March</a></li>
          </ul>
        </li>
      </ul>
      <em id="corner"></em> </aside>
    <!-- ENDS sidebar -->
  </div>
</div>
<!-- ENDS MAIN -->
<?php
include_once('footer.php');
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
    $date = date("Y-m-d");
    $name = mysqli_real_escape_string($conn, $_POST['author']);
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : "";
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Prepare and execute SQL query
    $sql = "INSERT INTO comments VALUES ('0', '$postId', '$name', '$email', '$date', '$comment')";
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