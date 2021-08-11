<?php 
	function get_todo_list() {
		$handle = fopen("todo.csv", "r");
		$data = fgetcsv($handle, 1000, ",");
		return $data;
		fclose($handle);
	}
?>