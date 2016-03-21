<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>上传确认</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <?php
    include 'variables.php';

    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to create table
        $sql = "CREATE TABLE papers (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name TEXT NOT NULL,
                author TEXT,
                content LONGTEXT,
                upload_date TIMESTAMP DEFAULT current_timestamp
            )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table  created successfully";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    ?>
</div>
</body>
</html>