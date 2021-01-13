<?php
    $conn = "mysql:host=db;dbname=demo";
    $user = "root";
    $password = "example";
    $pdo = new PDO($conn, $user, $password);
    $stm = $pdo->query("SELECT VERSION()");
    $version = $stm->fetch();
    echo $version[0] . PHP_EOL;
    echo "PHP works very well !!!";

    $table = "citation";
    try {
        $sql = "CREATE TABLE IF NOT EXISTS $table(
            id INT AUTO_INCREMENT PRIMARY KEY,
            content VARCHAR(255) NOT NULL,
            author VARCHAR(100) NOT NULL)";
        $pdo->exec($sql);
        echo "Table $table created";
    } catch(PDOException $e) {
        // TODO: pas trop de détails à destination du client
        echo $e->getMessage();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "INSERT INTO $table (content, author) VALUES (?,?)";
        $stm = $pdo->prepare($sql);

        // TODO: sanitize the inputs !!!
        $stm->execute([$_POST['content'], $_POST['author']]);
        echo "<p>Citation enregistrée</p>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Docker Citation</title>
</head>
<body>
    <h1>TP Docker Citation</h1>
    <form action="index.php" method="post">
        <textarea name="content" cols="30" rows="10"></textarea>
        <br>
        <input type="text" name="author">
        <br>
        <button>Enregistrer</button>
    </form>
</body>
</html>