<?php
	
	require "../assets/database.php";
	require "../assets/student.php";
	require "../assets/auth.php";

	session_start();

	if( !isLoggedIn() ){
		die("nepovolený přístup");
	}


	$connection = connectionDB();

	if( isset($_GET["id"]) and is_numeric($_GET["id"]) ) {
		$students = getStudent($connection, $_GET["id"]);
	}
	// var_dump($students);

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

	<main>
		<section>
			<h1>Informace o žákovi</h1>
		</section>
		
		<section>
			<?php if($students === NULL): ?>
				<p>Žák nenalezen</p>
			<?php else: ?>
				<h2><?= htmlspecialchars($students["first_name"]). " " .htmlspecialchars($students["second_name"]) ?></h2>
				<p>Věk: <?= htmlspecialchars($students["age"])?></p>
				<p>Dodatečné informace: <?= htmlspecialchars($students["live"])?></p>
				<p>Přiřazená kolej: <?= htmlspecialchars($students["collage"])?></p>
			<?php endif; ?>   

		</section>

		<section class="buttons">
			<a href="edit-student.php?id=<?= $students['id'] ?>">Editovat</a>
			<a href="delete-student.php?id=<?=$students['id'] ?>">Vymazat</a>
		</section>

	</main>

	<?php require "../assets/footer.php" ?>
	<script src="../js/index-header.js"></script>
</body>
</html>