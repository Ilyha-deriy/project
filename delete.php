<?php


	if (isset($_GET['todo'])) {
		$todo = $_GET['todo'];
		$handle = fopen("todo.csv", "r");
		$tmp_arr = fgetcsv($handle, 1000, ",");
		fclose($handle);

		foreach ($tmp_arr as $key => $value) {
			if ($value == $todo){
				unset($tmp_arr[$key]);
				break;
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
	<title>Delete Todo</title>
</head>
<body>

	<form action="delete.php" method="get">
		<input type="text" name="todo" value="<?php echo $_GET['val']; ?>" readonly>
		<input type="submit" name="delete" value="delete">
	</form>

	<h1><a href="Task4.php">Back</a></h1>

</body>
</html>