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
    <table>
        <tr><th>Id</th><th>名称</th><th>作者</th><th>上传时间</th></tr>
        <?php
        include 'variables.php';

        // 创建连接
        $conn = new mysqli($server_name, $username, $password, $db_name);
        // 检测连接
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, author, upload_date FROM papers where ".$_POST['search_condition']." like '%".trim($_POST['keyword'])."%'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            // 输出每行数据
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='article_display.php?id=" .$row["id"]."'>". $row["id"]. "</a></td>";
                echo "<td><a href='article_display.php?id=" .$row["id"]."'>". $row["name"]. "</a></td>";
                echo "<td><a href='article_display.php?id=" .$row["id"]."'>" . $row["author"]."</a></td>";
                echo "<td><a href='article_display.php?id=" .$row["id"]."'>". $row["upload_date"] ."</a></td>";
                echo "</tr>";
            }
        }

        $conn->close();
        ?>
    </table>
    <a href="index.html" class="return_index">返回主页</a>
</div>

</body>
</html>