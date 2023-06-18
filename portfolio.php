<?php
include_once('header.php');

// Define the number of projects to display per page
$projectsPerPage = 10; // You can adjust this value based on your preference

// Get the current page from the query string or use a default value
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the OFFSET for the database query
$offset = ($currentPage - 1) * $projectsPerPage;

$query2 = "SELECT * FROM projects LIMIT $projectsPerPage OFFSET $offset";
$res = $conn->query($query2);

?>
<a href="#" id="top-open">Menu</a> </div>
      <!-- ENDS top-widget -->
      <div class="wrapper clearfix"> <a href="index.php" id="logo"><img  src="img/empress_logo.png" alt="" width="200px" height="100px"></a>
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
            <li class="current-menu-item" ><a href="portfolio.php">Portfolio</a></li>
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
    <!-- thumbs -->
    <div class="portfolio-thumbs clearfix">
      <figure>
        <figcaption> <strong>Pellentesque habitant morbi</strong> <span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span> <em>December 08, 2011</em> <a href="project.php" class="opener"></a> </figcaption>
        <a href="project.php" class="thumb"><img src="img/dummies/featured-1.jpg" alt=""></a> </figure>
      <figure>
        <figcaption> <strong>Pellentesque habitant morbi</strong> <span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span> <em>December 08, 2011</em> <a href="project.php" class="opener"></a> </figcaption>
        <a href="" class="thumb"><img src="img/dummies/featured-2.jpg" alt=""></a> </figure>
      <figure>
        <figcaption> <strong>Pellentesque habitant morbi</strong> <span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span> <em>December 08, 2011</em> <a href="project.php" class="opener"></a> </figcaption>
        <a href="" class="thumb"><img src="img/dummies/featured-3.jpg" alt=""></a> </figure>
      <?php
        // Check if any projects are found
if (mysqli_num_rows($res) > 0) {
  echo '<div class="portfolio-thumbs clearfix">';
  
  // Loop through each project
  while ($row = mysqli_fetch_assoc($res)) {
      // $_GET['id'] = $row['id'];
      $projectTitle = $row['project_name'];
      $projectDescription = $row['description'];
      $projectDate = $row['date'];
      $projectImage = $row['image'];

      // Display project information and image in a figure element
      echo '<figure>';
      echo '<figcaption>';
      echo '<strong>' . $projectTitle . '</strong>';
      echo '<span>' . $projectDescription . '</span>';
      echo '<em>' . $projectDate . '</em>';
      echo '<a href="project.php?id=' . $row['id'] . '" class="opener"></a>';
      echo '</figcaption>';
      echo '<a href="project.php?id=' . $row['id'] . '" class="thumb"><img src="black-empress-admin/pages/' . $projectImage . '" alt="" style="width: 300px; height: 200px;"></a>';
      echo '</figure>';
  }
  
  echo '</div>';
} else {
  echo 'No projects found.';
}

// Close the database connection
// mysqli_close($conn);
?>
 </div>
    <!-- ends thumbs-->
    <!-- pager -->
    <!-- <ul class="pager">
      <li class="paged">Page 1 of 2</li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
    </ul> -->
<?php
   // Get the total number of projects
$totalProjectsQuery = "SELECT COUNT(*) as total FROM projects";
$totalProjectsResult = mysqli_query($conn, $totalProjectsQuery);
$totalProjectsRow = mysqli_fetch_assoc($totalProjectsResult);
$totalProjects = $totalProjectsRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalProjects / $projectsPerPage);

// Generate the pagination links
echo '<ul class="pager">';
echo '<li class="paged">Page ' . $currentPage . ' of ' . $totalPages . '</li>';

// Generate the pagination links for each page
for ($i = 1; $i <= $totalPages; $i++) {
  if ($i == $currentPage) {
    echo '<li class="active"><a href="#">' . $i . '</a></li>';
  } else {
    echo '<li><a href="portfolio.php?page=' . $i . '">' . $i . '</a></li>';
  }
}

echo '</ul>';
echo '<div class="clearfix"></div>';
// ENDS pager

// Close the database connection
// mysqli_close($conn);
?>
    <!-- ENDS pager -->
  </div>
</div>
<!-- ENDS MAIN -->
<?php
include_once('footer.php');
?>
</body>
</html>
