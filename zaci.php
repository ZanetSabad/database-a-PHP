<?php
	
	require "assets/database.php";

	// echo "Úspěšné přihlášení do databáze";

	$sql = "SELECT * FROM student ";
	// echo "<br>";

	$connection = connectionDB();

	$result = mysqli_query($connection, $sql);

	if( $result === false ) {
		echo mysqli_error($connection);
	} else {
		$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

   
	// var_dump($students);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</body>
</html>