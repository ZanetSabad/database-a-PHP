<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

				<link rel="stylesheet" href="css/general.css">
                <link rel="stylesheet" href="css/header.css">
				<link rel="stylesheet" href="query/header-query.css">
				<link rel="stylesheet" href="css/footer.css">
				
                <script src="https://kit.fontawesome.com/830a127f42.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <main>
        <section class="form">
            <h1>Přihlášení</h1>
            <form action="admin/login.php" method="POST">
                <input type="email" name="login-email"><br>
                <input type="password" name="login-password"><br>
                <button>Přihlásit</button>
            </form>
        </section>
    </main>

    <?php require "assets/footer.php" ?>
	<script src="js/index-header.js"></script>	
</body>
</html>