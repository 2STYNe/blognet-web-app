<?php
include ("connection.php");

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['blogtitle'];
    $paragraph = $_POST['blogpara'];
	$sqlUpd = "update blog_table set title = ?, paragraph = ? where id = ?";
    $stmt = $conn->prepare($sqlUpd);
    // $stmt->bind_param('s', $title);
	$stmt->bind_param('ssi', $title, $paragraph, $id);
    // $stmt->bind_param('s', $paragraph);
    // $stmt->bind_param('i', $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
} else {
	$sql = "select id,title, date_of_creation, paragraph FROM blog_table WHERE id = ?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$tmp_id="";
	$title= "";
	$paragraph = "";
	$filename = "";
	$date = "";
	$stmt->bind_result($tmp_id,$title, $date, $paragraph);
	$stmt->fetch();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blognet | Edit Post</title>
    <link rel="stylesheet" href="styles/style.css">

</head>
<body>
    <div class="top-bar">
      <a href="index.php">  
        <span id="topBarTitle">Blog | Edit Post</span>
      </a>
      
    </div>
    <div class="writing-section">
		<h1>Edit Post</h1>
			<form action="edit.php?id=<?php echo $id; ?>" method="POST" >
				<input
					id="blogTitle"
					name="blogtitle"
					type="text"
					placeholder="Blog Title..."
					autocomplete="off"
                    value="<?php echo htmlspecialchars($title); ?>"
				/>
				<textarea
					id="blogPara"
					name="blogpara"
					cols="75"
					rows="10"
					type="text"
					placeholder="Blog Paragraph..."
					autocomplete="off"
				>
                <?php echo htmlspecialchars($paragraph); ?>
            </textarea>
				<label for="uploadimage">
					<span>Upload Image: </span>
					<input type="file" name="uploadimage" />
				</label>
				<label for="blogdate">
					<span id="dateLabel">Date: </span>

					<input id="blogDate" name="blogdate" readonly value="<?php echo htmlspecialchars($date); ?>"/>
				</label>

				<button id="saveBtn" type="submit">Update Post</button>
			</form>

			<br />
		</div>
</body>
</html>
