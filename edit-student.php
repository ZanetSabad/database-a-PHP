<?php 

    require "assets/database.php";
    require "assets/student.php";

    $connection = connectionDB();

    // Vytažení inforamcí z databáze
    if(isset($_GET["id"]) and is_numeric($_GET["id"])) {
        $one_student = getStudent($connection, $_GET["id"]);

        if($one_student) {
            $first_name = $one_student["first_name"];
            $second_name = $one_student["second_name"];
            $age = $one_student["age"];
            $live = $one_student["live"];
            $collage = $one_student["collage"];
            $id = $one_student["id"];
        } else {
            die("Student nenalezen");
        }

     
    } else {
        die("Id není zadáno, student nenalezen");
    }


    // Po odeslání formuláře
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $live = $_POST["live"];
        $collage = $_POST["collage"];

     updateStudent($connection, $first_name, $second_name, $age, $live, $collage, $id);
    }      

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="query/header-query.css">
    <script src="https://kit.fontawesome.com/830a127f42.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <?php require "assets/form-student.php" ?>


    <?php require "assets/footer.php" ?>
    <script src="js/index-header.js"></script>
</body>
</html>