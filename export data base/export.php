<?php

include_once("../framework/framework.php");

$connection = mysqli_connect('localhost', 'root', '', 'gym');

$tables = array();
$result = mysqli_query($connection, "SHOW TABLES");
while ($row = mysqli_fetch_row($result)) {
	$tables[] = $row[0];
}

$return = '';
foreach ($tables as $table) {
	$result = mysqli_query($connection, "SELECT * FROM " . $table);
	$num_fields = mysqli_num_fields($result);

	// $return .= 'DROP TABLE '.$table.';';
	$row2 = mysqli_fetch_row(mysqli_query($connection, "SHOW CREATE TABLE " . $table));
	$return .= "\n\n" . $row2[1] . ";\n\n";

	for ($i = 0; $i < $num_fields; $i++) {
		while ($row = mysqli_fetch_row($result)) {
			$return .= "INSERT INTO " . $table . " VALUES(";
			for ($j = 0; $j < $num_fields; $j++) {
				$row[$j] = addslashes($row[$j]);
				if (isset($row[$j])) {
					$return .= '"' . $row[$j] . '"';
				} else {
					$return .= '""';
				}
				if ($j < $num_fields - 1) {
					$return .= ',';
				}
			}
			$return .= ");\n";
		}
	}
	$return .= "\n\n\n";
}

//save file
$handle = fopen("backup.sql", "w+");
fwrite($handle, $return);
fclose($handle);
?>
<style>
	.alert {
		padding: 20px;
		background-color: green;
		color: white;
	}

	.closebtn {
		margin-left: 15px;
		color: white;
		font-weight: bold;
		float: right;
		font-size: 22px;
		line-height: 20px;
		cursor: pointer;
		transition: 0.3s;
	}

	.closebtn:hover {
		color: black;
	}
</style>




<div class="alert">
	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
	<strong>Backup successful !!!</strong> Successfully backed up
</div>
<?php
redirect("1", "../index.php");
?>