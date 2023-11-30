<?php
	
	require "assets/database.php";
	require "assets/student.php";

	$connection = connectionDB();

	// echo "Úspěšné přihlášení do databáze";

	$students = getAllStudents($connection, "id, first_name, second_name");

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
	<?php require "assets/header.php"; ?>

	<main>
		<section class="main-heading">
			<h1>Seznam žáků školy</h1> 
		</section>
		<section class="students-list">   
			<?php if (empty($students)): ?>
				<p>Žáci nebyly nalezeni</p>   
			<?php else: ?>
				<ul>
					<?php foreach($students as $one_student): ?>
						<li>
							<?= htmlspecialchars($one_student["first_name"]). " ". htmlspecialchars($one_student["second_name"]) ?>
						</li>
						<a href="one-student.php?id=<?= $one_student['id']?>">Více informací</a>
					<?php endforeach ?>   
				</ul>
			<?php endif; ?>
		</section>
	</main>

	<?php require "assets/footer.php" ?>
   
	<a href="index.php">Zpět na úvodní stránku</a>
	<script src="js/index-header.js"></script>
</body>
</html>