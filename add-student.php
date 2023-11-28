<?php 

    require "assets/database.php";

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

    $sql = "INSERT INTO student (first_name, second_name, age, live, collage)
    VALUES (?, ?, ?, ?, ?)";

    $connection = connectionDB();

        $statement = mysqli_prepare($connection, $sql);
        
        if($statement === false){
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($statement, "ssiss", $_POST["first_name"], $_POST["second_name"], $_POST["age"], $_POST["live"], $_POST["collage"]);

            if(mysqli_stmt_execute($statement)) {
                $id = mysqli_insert_id($connection);

                if(isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off") {
                    $url_protocol = "https";
                } else {
                    $url_protocol = "http";
                }

                header("location: $url_protocol://" . $_SERVER["HTTP_HOST"] . "/databaze/one-student.php?id=$id" );
                // header("location: one-student.php?id=$id");
                
            } else {
                echo mysqli_stmt_error($statement);
            }
        }       

    // $result = mysqli_query($connection, $sql);
    // if ($result === false) {
    //     echo mysqli_error($connection);
    // } else {
    //     $id = mysqli_insert_id($connection);
    //     echo "Úspěšně vložen žák s id: $id";
    // } 

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