<?php
    require "../assets/student.php";
    require "../assets/bradavice.php";
    require "../assets/auth.php";

	session_start();

	if( !isLoggedIn() ){
		die("nepovolený přístup");
	}


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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://kit.fontawesome.com/830a127f42.js" crossorigin="anonymous"></script>
<title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php" ?>

    <section class="delete-form">
        <form method="POST">
            <p>Jste si jisti, že chcete tohoto studenta smazat?</p>
            <button>Smazat</button>
            <a href="zaci.php">Zpět na seznam žáků</a><br>
            <a href="one-student.php?id=<?=$_GET['id']?>">Zrušit</a>
        </form>
    </section>

    <?php require "../assets/footer.php"?>
    <script src="../js/index-header.js"></script>
</body>
</html>