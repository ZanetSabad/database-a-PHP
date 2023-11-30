<?php
    require "assets/student.php";
    require "assets/database.php";

    $connection = connectionDB();

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        deleteStudent($connection, $_GET["id"]);
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <section class="delete-form">
        <form method="POST">
            <p>Jste si jisti, že chcete tohoto studenta smazat?</p>
            <button>Smazat</button>
            <a href="zaci.php">Zpět na seznam žáků</a><br>
            <a href="one-student.php?id=<?=$_GET['id']?>">Zrušit</a>
        </form>
    </section>

    <?php require "assets/footer.php"?>
    
</body>
</html>