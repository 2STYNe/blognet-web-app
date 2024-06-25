<?php

include ("connection.php");

$blogTitle = $_POST["blogtitle"];

$blogDate = $_POST["blogdate"];

$blogPara = $_POST["blogpara"];

if(isset($_FILES['uploadimage']))
{
  $filename = $_FILES['uploadimage']['name'];
  $tempname = $_FILES['uploadimage']['tmp_name'];
  $upload_path = "images/" . basename($filename);

  $upload_error = $_FILES['uploadimage']['error'];
  if($upload_error !== UPLOAD_ERR_OK) {
      die("Upload failed with error code $upload_error");
  }
  
  if (move_uploaded_file($tempname, $upload_path)) {
    $sql = "insert into blog_table (title, date_of_creation, paragraph, image_filename) values (?,?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",$blogTitle,$blogDate,$blogPara, $filename);
    $stmt->execute();
    echo "Hello there";
  
    $conn->close();
  }

} else {
  $sql = "insert into blog_table (title, date_of_creation, paragraph) values (?,?,?);";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss",$blogTitle,$blogDate,$blogPara);
  $stmt->execute();
  $conn->close();
  echo "Not working";
}


?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blognet | Post Saved</title>

    <link rel="stylesheet" href="styles/style.css">

  </head>

  <body>

    <div class="container" style="width: 50%; margin: auto; text-align: justify; font-family: Roboto, sans-serif;">

      <h1 style="margin-bottom: 10px; text-align: center;">Post Saved</h1>

      <center><a style="color: dodgerblue;" href="index.php">Go to Home Page</a></center>
      
      <br><br>

      <?php echo "<span style='font-weight: bold;' id='showTitle'>" . $blogTitle . "</span>" ?>
      <br>

      <span id="showDate"><?php echo $blogDate ?></span><br><br>

      <center><img src="images/<?php echo $filename; ?>" id="showImage" style="width: 50%; height: auto;"></center>

      <br>

      <?php echo "<span id='showPara'>" . $blogPara . "</span>" ?>

      <br><br>
      
    </div>

  </body>
  
</html>