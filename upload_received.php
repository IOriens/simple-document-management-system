<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>上传确认</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
	<h2><?=$_POST['name']?><br></h2>
	<h3><?=$_POST['author']?><br></h3>
	<?php echo $_POST["content"]; ?>

	<?php
	include 'variables.php';

	try {
		$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("INSERT INTO papers (name, author, content) VALUES (:name, :author , :content)");


		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':author', $author);
		$stmt->bindParam(':content', $content);


		$name = $_POST['name'];
		$author = $_POST['author'];
		$content = $_POST["content"];
		$stmt->execute();
	} catch (PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
	?>
	<a href="index.html" class="return_index">返回主页</a>
</div>
</body>
</html>