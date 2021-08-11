<?php 


	if (isset($_GET['todo']) and isset($_GET['todo_old'])) {
		$todo = $_GET['todo'];
		$todo_old = $_GET['todo_old'];
		$handle = fopen("todo.csv", "r");
		$tmp_arr = fgetcsv($handle, 1000, ",");
		fclose($handle);

		foreach ($tmp_arr as $key => $value) {
			if ($value == $todo_old){
				$tmp_arr[$key] = $todo;
			}
		}

		$handle = fopen("todo.csv", "w");
		fputcsv($handle, $tmp_arr);
		fclose($handle);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Todo Edit</title>
</head>
<body>
	<form action="edit.php" method="get">
		<input type="hidden" name="todo_old" value="<?php echo $_GET['val']; ?>">
		<input type="text" name="todo" value="<?php echo $_GET['val']; ?>">
		<input type="submit" name="edit" value="edit">
	</form>

	<h1><a href="Task4.php">Back</a></h1>
</body>
</html>