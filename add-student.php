<?php 

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        require "assets/database.php";
           
    $sql = "INSERT INTO student (first_name, second_name, age, live, collage)
    VALUES (?, ?, ?, ?, ?)";

        $statement = mysqli_prepare($connection, $sql);
                
        mysqli_stmt_bind_param($statement, "ssiss", $_POST["first_name"], $_POST["second_name"], $_POST["age"], $_POST["live"], $_POST["collage"]);

        mysqli_stmt_execute($statement);

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
            <form action="add-student.php" method="POST">
                <input type="text" name="first_name" placeholder="Křestní jméno"><br>
                <input type="text" name="second_name" placeholder="Příjmení"><br>
                <input type="number" name="age" placeholder="Věk" min="10"><br>
                <textarea name="live" placeholder="Podrobnosti o žákovi"> </textarea> <br>
                <input type="text" name="collage" placeholder="Kolej"><br>
                <button>Přidat</button>
            </form>
        </section>
    </main>


    <?php require "assets/footer.php" ?>
    
</body>
</html>