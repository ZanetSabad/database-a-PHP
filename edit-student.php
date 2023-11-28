<?php 

    require "assets/database.php";
    require "assets/student.php";

    $connection = connectionDB();

    if(isset($_GET["id"]) and is_numeric($_GET["id"])) {
        $one_student = getStudent($connection, $_GET["id"]);

        $first_name = $one_student["first_name"];
        $second_name = $one_student["second_name"];
        $age = $one_student["age"];
        $live = $one_student["live"];
        $collage = $one_student["collage"];
    } else {
        $one_student = null;
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

    <?php require "assets/form-student.php" ?>


    <?php require "assets/footer.php" ?>
</body>
</html>