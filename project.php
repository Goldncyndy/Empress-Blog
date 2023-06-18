<?php
include_once('header.php');

$projectId = $_GET['id'];
// Fetch data from the 'projects' table
$query = "SELECT * FROM projects WHERE id = " . $projectId;
$result = mysqli_query($conn, $query);

?>
<a href="#" id="top-open">Menu</a> </div>
      <!-- ENDS top-widget -->
      <div class="wrapper clearfix"> <a href="index.php" id="logo"><img  src="img/empress_logo.png" alt="" width="200px" height="100px"></a>
        <nav>
          <ul id="nav" class="sf-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="page.php">About</a></li>
            <li class="current-menu-item"><a href="portfolio.php">Portfolio</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
          <div id="combo-holder"></div>
        </nav>
  </div>
</header>
<!-- MAIN -->
<div id="main">
  <div class="wrapper clearfix">
    <h2 class="page-heading"><span>WORK</span></h2>
    <!-- project content -->
    <div id="project-content" class="clearfix">
      <!-- slider -->

      <?php
        // Check if any rows are returned
if (mysqli_num_rows($result) > 0) {
  // Fetch each row of data
  while ($row = mysqli_fetch_assoc($result)) {
      $projectName = $row['project_name'];
      $projectImage = $row['image'];
      $projectDescription = $row['description'];
      $projectDate = $row['date'];
      $projectSkills = $row['skill'];

      // Output the HTML with the fetched data
      echo '<div class="project-slider">
                <div class="flexslider">
                  <ul class="slides">
                    <li><img src="black-empress-admin/pages/' . $projectImage . '" alt="" style="width: 1000px; height: 500px;"></li>
                  </ul>
                </div>
              </div>
              <div class="project-heading">
                <h2>' . $projectName . '</h2>
                <a href="" class="launch">Launch project</a>
                <div class="clearfix"></div>
              </div>
              <div class="project-description">' . $projectDescription . '</div>
              <div class="project-info">
                <p><strong>Date</strong><br/>' . $projectDate . '</p>
                <p><strong>Skills</strong><br/>' . $projectSkills . '</p>
              </div>';
  }
} else {
  echo "No projects found.";
}
// Close the database connection
mysqli_close($conn);
?>
      <!-- <div class="project-slider">
        <div class="flexslider">
          <ul class="slides">
            <li> <img src="img/slides/01.jpg" alt=""> </li>
            <li> <img src="img/slides/02.jpg" alt=""> </li>
            <li> <img src="img/slides/03.jpg" alt=""> </li>
          </ul>
        </div>
      </div> -->
      <!-- ENDS slider -->
      <!-- heading -->
      <!-- <div class="project-heading">
        <h2>Project name</h2>
        <a href="#" class="launch">Launch project</a>
        <div class="clearfix"></div>
      </div> -->
      <!-- ENDS heading -->
      <!-- <div class="project-description"> Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. </div>
      <div class="project-info">
        <p> <strong>Date</strong><br/>
          March 12, 2011 </p>
        <p> <strong>Skills</strong><br/>
          Photoshop, Illustrator </p>
      </div> -->
      <div class="clearfix"></div>
      <div class="project-pager"> <a class="previous-project" href="#">&#8592; Previous project</a> <a class="next-project" href="#">Next project &#8594;</a> </div>
      <!-- related -->
      <div class="related-projects">
        <div class="related-heading">Related projects</div>
        <div class="related-list">
          <!-- <figure> <a href="#" class="thumb"><img src="img/dummies/featured-1.jpg" alt=""></a> <a href="single.php" class="heading">Pellentesque habitant morbi</a> </figure>
          <figure> <a href="#" class="thumb"><img src="img/dummies/featured-2.jpg" alt=""></a> <a href="single.php" class="heading">Pellentesque habitant morbi</a> </figure>
          <figure> <a href="#" class="thumb"><img src="img/dummies/featured-3.jpg" alt=""></a> <a href="single.php" class="heading">Pellentesque habitant morbi</a> </figure>
          <figure class="last"> <a href="#" class="thumb"><img src="img/dummies/featured-4.jpg" alt=""></a> <a href="single.php" class="heading">Pellentesque habitant morbi</a> </figure> -->
          <?php
            // Check if any projects are found
            if (mysqli_num_rows($result2) > 0) {
            echo '<div class="related-list">';
  
            // Loop through each project
            while ($row = mysqli_fetch_assoc($result2)) {
            $projectTitle = $row['project_name'];
            $projectImage = $row['image'];

          // Display project information and image in a figure element
            echo '<figure>';
            echo '<a href="" class="thumb"><img src="black-empress-admin/pages/' . $projectImage . '" alt="" style="width: 250px; height: 130px;"></a>';
            echo '<a href="project.php?id=' . $row['id'] . '" class="heading">' . $projectTitle . '</a>';
            echo '</figure>';
  }
  
  echo '</div>';
} else {
  echo 'No projects found.';
}

// Close the database connection
mysqli_close($conn);
?>
          ?>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- ENDS related -->
    </div>
    <!--  ENDS project content-->
  </div>
</div>
<!-- ENDS MAIN -->
<?php
include_once('footer.php');
?>
</body>
</html>
