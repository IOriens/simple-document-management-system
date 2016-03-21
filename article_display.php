<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据展示</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <a href="index.html" class="return_index">返回主页</a>
    <?php
    include 'variables.php';

    // 创建连接
    $conn = new mysqli($server_name, $username, $password, $db_name);
    // 检测连接
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, author, upload_date, content FROM papers where id = ".$_GET['id'];

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<h1>". $row['name']. "</h1><h2>". $row["author"]. "</h2><h4>" . $row["upload_date"]."</h4>". $row["content"];
    ?>

    <a href="index.html" class="return_index">返回主页</a>
</div>

</body>
</html>