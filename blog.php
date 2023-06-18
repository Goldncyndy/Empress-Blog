<?php
include_once('header.php');

     // Get the current page number
     $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

     // Set the number of results per page
     $results_per_page = 10;
     
     // Calculate the LIMIT clause for the SQL query
     $offset = ($page - 1) * $results_per_page;
     
     // Fetch data from the database based on the page number
     $sql = "SELECT * FROM blog_content LIMIT $offset, $results_per_page";
     $result5 = $conn->query($sql);
     
     // Display the fetched data
     if ($result5->num_rows > 0) {
         while ($row = $result5->fetch_assoc()) {
             // Display your data here
            //  echo $row['column_name'] . "<br>";
             isset($_GET['category']) . "<br>";
             $result->num_rows > 0 . "<br>";
         }
     } else {
         echo "No results found.";
     }
     
     // Calculate the total number of pages
     $sql = "SELECT COUNT(*) AS total FROM blog_content";
     $total_result = $conn->query($sql);
     $total_rows = $total_result->fetch_assoc()['total'];
     $total_pages = ceil($total_rows / $results_per_page);
     
     // Check if "Newer Entries" button is clicked
     if (isset($_GET['newer'])) {
         $page++;
     }
     
     // Check if "Older Entries" button is clicked
     if (isset($_GET['older'])) {
         $page--;
     }
     
     // Limit the page number within the valid range
     $page = max(1, min($page, $total_pages));

     
?>
<a href="#" id="top-open">Menu</a> </div>
      <!-- ENDS top-widget -->
      <div class="wrapper clearfix"> <a href="index.php" id="logo"><img  src="img/empress_logo.png" alt="" width="200px" height="100px"></a>
        <nav>
          <ul id="nav" class="sf-menu">
            <li><a href="index.php">Home</a></li>
            <li class="current-menu-item"><a href="blog.php">Blog</a></li>
            <li><a href="page.php">About</a>
            </li>
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
    <div id="posts-list">
    
    <?php
  if (isset($_GET['category'])) {
    // Sanitize the category value to prevent SQL injection
    $category = mysqli_real_escape_string($conn, $_GET['category']);

    // Fetch data from the "blog-content" table based on the selected category
    $sql = "SELECT * FROM blog_content WHERE category = '$category'";
    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_num_rows($res) > 0) {
      // Output data for each row
      while ($row = mysqli_fetch_assoc($res)) {
        // ... Display the blog post data ...
        // if ($result->num_rows > 0) {
          // Output data for each row
          // while ($row = $result->fetch_assoc()) {
            // $_GET['id'] = $row['id'];
              echo '<article class="format-standard">';
              echo '<div class="entry-date">';
              echo '<div class="number">' . date('d', strtotime($row['date'])) . '</div>';
              echo '<div class="year">' . date('M, Y', strtotime($row['date'])) . '</div>';
              echo '</div>';
              echo '<div class="feature-image"> <a href="single.php?id=' . $row['id'] . '" data-rel="prettyPhoto"><img src="black-empress-admin/pages/' . $row['image'] . '" alt="" width="100%" height="30%"></a> </div>';
              echo '<h2 class="post-heading"> <a href="single.php?id=' . $row['id'] . '">' . $row['topic'] . '</a></h2>';
              echo '<div class="excerpt">' . $row['blog-content'] . '</div>';
              echo '<a href="single.php?id=' . $row['id'] . '" class="read-more">continue &#8594;</a>';
              echo '<div class="meta">';
              echo '<div class="categories">In ' . $row['category'] . '</div>';
              echo '<div class="comments"><a href="single.php?id=' . $row['id'] . '">' . $row['comments'] . ' comments </a></div>';
              echo '<div class="user"><a href="page.php">By Black Empress</a></div>';
              echo '</div>';
              echo '</article>';
          // }
      // } else {
      //     echo 'No blog posts found.';
      // }
      }
    } else {
      echo 'No blog posts found for the selected category.';
    }

    // Close the result set
    mysqli_free_result($result);
  } else {
    // echo 'No category selected.';
    if ($result->num_rows > 0) {
      // Output data for each row
      while ($row = $result->fetch_assoc()) {
        $_GET['id'] = $row['id'];
          echo '<article class="format-standard">';
          echo '<div class="entry-date">';
          echo '<div class="number">' . date('d', strtotime($row['date'])) . '</div>';
          echo '<div class="year">' . date('M, Y', strtotime($row['date'])) . '</div>';
          echo '</div>';
          echo '<div class="feature-image"> <a href="single.php?id=' . $row['id'] . '" data-rel="prettyPhoto"><img src="black-empress-admin/pages/' . $row['image'] . '" alt="" width="100%" height="30%"></a> </div>';
          echo '<h2 class="post-heading"> <a href="single.php?id=' . $row['id'] . '">' . $row['topic'] . '</a></h2>';
          echo '<div class="excerpt">' . $row['blog-content'] . '</div>';
          echo '<a href="single.php?id=' . $row['id'] . '" class="read-more">continue &#8594;</a>';
          echo '<div class="meta">';
          echo '<div class="categories">In ' . $row['category'] . '</div>';
          echo '<div class="comments"><a href="single.php?id=' . $row['id'] . '">' . $row['comments'] . ' comments </a></div>';
          echo '<div class="user"><a href="page.php">By Black Empress</a></div>';
          echo '</div>';
          echo '</article>';
      }
  } else {
      echo 'No blog posts found.';
  }
  }

  ?>
      <!-- page-navigation -->
      <div class="page-navigation clearfix">

<?php
// Display the pagination links
echo '<div class="page-navigation clearfix">';
if ($page > 1) {
    echo '<div class="nav-next"> <input type="button" name="older" href="single.php?page=' . ($page - 1) . '" value=" &#8592; Older Entries" </div>';
}
if ($page < $total_pages) {
    echo '<div class="nav-previous"> <input type="button" name="newer" href="single.php?page=' . ($page + 1) . '" value=" Newer Entries &#8594;" </div>';
}
echo '</div>';

// Close the database connection
// $conn->close();
?>
        <!-- <div class="nav-next"> <a  href="#">&#8592; Older Entries </a> </div>
        <div class="nav-previous"> <a href="#">Newer Entries &#8594;</a> </div> -->
        <!--ENDS page-navigation -->
      <!-- </div> -->
    </div>
    <!-- ENDS posts list -->
    <!-- sidebar -->
    <aside id="sidebar" style="background-color: #FF1493; color: white;">
      <ul>
        <li class="block">
          <h4 style=" color:white;">CATEGORIES</h4>
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
          <h4 style=" color:white;">ARCHIVES</h4>
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

