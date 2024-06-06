<?php
include ("connection.php");
$id = $_GET['id'];
$sql = "select id,title, date_of_creation, paragraph FROM blog_table WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$tmp_id="";
$title= "";
$paragraph = "";
$filename = "";
$date = "";
$stmt->bind_result($tmp_id,$title, $date, $paragraph);
$stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blognet | View Blog</title>

    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="top-bar">
      <a href="index.php">  
        <span id="topBarTitle">Blog | View Post</span>
      </a>
      <?php
      echo "<div>";
       echo "<a class='link-btn' href='edit.php?id=".$id."'>Edit Post</a>"; 
       echo "<a class='link-btn' id='delete-btn' href='delete.php?id=".$id."'>Delete Post</a>";
       echo "</div>";
      ?>
    </div>
    <?php
          echo "<div class='view_post_container'>";
            echo "<span class='title'>" . $title . "</span><br>";
    if (isset($blog["image_filename"])) {

            echo "<img class='view_img' src='images/" . $filename . "'><br>"; 
          } else {
            echo "<img class='view_img' src='images/default.png'><br>"; 
          }
          echo "<div class='details'>";
          

          echo "<span class='date'>" . $date . "</span><br><br>";

          

          echo "<p>" . $paragraph . "...</p><br>";
          echo "</div>";
    ?>
</body>
</html>