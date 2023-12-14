<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="query/header-query.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/830a127f42.js"></script>
    <title>Registrace</title>
</head>
<body>
    <?php require "assets/header.php" ?>
    <main>
        <section class="registration-form">
            <form action="" method="POST">
                <input type="text"  name="first_name" placeholder="Křestní jméno: "><br>
                <input type="text" name="second_name" placeholder="Příjmení"> <br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="password" placeholder="Heslo"><br>
                <input type="password" placeholder="Heslo znovu"><br>
                <button>Zaregistrovat</button>
            </form>
        </section>
    </main>        
    <?php require "assets/footer.php" ?>
	<script src="js/index-header.js"></script>
</body>
</html>