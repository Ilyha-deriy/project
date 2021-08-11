<?php


	if (isset($_GET['todo'])) {
		$todo = $_GET['todo'];
		$handle = fopen("todo.csv", "r");
		$tmp_arr = fgetcsv($handle, 1000, ",");
		fclose($handle);

		$handle = fopen("todo.csv", "w");
		$tmp_arr[] = $todo;
		fputcsv($handle, $tmp_arr);
		fclose($handle);
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Todo</title>
</head>
<body>

	<form action="create.php" method="get">
		<input type="text" name="todo">
		<input type="submit" name="create" value="create">
	</form>

	<h1><a href="Task4.php">Back</a></h1>

</body>
</html>