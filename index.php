<?php

include("./include/header.php");
include("./include/sliderphp");

if (isset($_GET['category'])) {
  $category_id = $_GET['category'];

  $posts = $db->prepare('SELECT * FROM posts WHERE category_id = :id');
  $posts->execute(['id' => $category_id]);
 
} else {
  $query_posts = "SELECT * FROM posts";
  $posts = $db->query($query_posts);
}

?>

<?php include("./include/footer.php") ?>