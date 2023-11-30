<?php 

    require "assets/database.php";
    require "assets/student.php";

    $connection = connectionDB();

    $first_name = null;
    $second_name = null;
    $age = null;
    $live = null;
    $collage = null;
    
    
    if($_SERVER["REQUEST_METHOD"] === "POST") {
      
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $live = $_POST["live"];
        $collage = $_POST["collage"];           
        
        createStudent($connection, $first_name, $second_name, $age, $live, $collage);

    }
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <main>
        <section class="add-form">
            
            <?php require "assets/form-student.php"; ?>

        </section>
    </main>


    <?php require "assets/footer.php" ?>
    
</body>
</html>