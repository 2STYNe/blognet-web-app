<!DOCTYPE html>

<html lang="en">
  
  <head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blognet | All Blogs</title>

    <link rel="stylesheet" href="styles/style.css">

  </head>

  <body>

    <div class="top-bar">

      <a href="index.php">  
        <span id="topBarTitle">Blog | All Posts</span>
      </a>
      <?php echo "<a class='link-btn' href='index.html'>New Post</a>"; ?>

    </div>

    <br>

    <div class="all-posts-container">

      <?php

      include ("connection.php");

      $sql = "select id,title, date_of_creation, paragraph from blog_table;";

      $result = $conn->query($sql);

      if($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          $id =  $row["id"];
          echo "<div style='padding: 25px 25px;' class='post-container'>";

          if (isset($row["image_filename"])) {

            echo "<img style='width: 100%; height: auto' id='displayImage' src='images/" . $row["image_filename"] . "'><br>"; 
          } else {
            echo "<img style='width: 100%; height: auto' id='displayImage' src='images/default.png'><br>"; 
          }
          echo "<div class='details'>";
          echo "<span id='displayTitle'>" . $row["title"] . "</span><br>";

          echo "<span id='displayDate'>" . $row["date_of_creation"] . "</span><br><br>";

          

          echo "<p style='overflow: hidden; display: -webkit-box; -webkit-line-clamp: 10; line-clamp: 10; -webkit-box-orient: vertical;' id='displayPara'>" . substr($row["paragraph"],0,60) . "...</p><br>";
          echo "</div>";
          echo "<a class='link-btn' href='view_post.php?id=".$id ."'>View Blog</a>";
          
          echo "</div>";
        }
      }
      
      else
      {
        echo "<center><span>No Blog Posts Found</span></center>";
      
      }

      $conn->close();
      
      ?>

    </div>

    

  </body>
  
</html>