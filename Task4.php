<?php
	ini_set('display_errors', 1);
	error_reporting();
	require 'todo.php';
	$todo_list = get_todo_list();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Список студентов</title>
	</head>
	<body>
		<h1>Список студентов</h1>
		<form action="create.php" method="get">
			<input type="submit" name="create" value="create">
		</form>
		<ul>
			<?php foreach ($todo_list as $key => $todo) : ?>
			<li>
				<?php echo $todo ?>
				<form action="edit.php" method="get">
					<input type="hidden" name="val" value="<?php echo $todo; ?>">
					<input type="submit" name="edit" value="edit">
				</form>
				<form action="delete.php" method="get">
					<input type="hidden" name="val" value="<?php echo $todo; ?>">
					<input type="submit" name="delete" value="delete">
				</form>
			</li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>