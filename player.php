<?php
$player_name = $_GET["name"];

try {
	$conn = new PDO('mysql:host=assignment1.crptfeceqj4e.us-west-2.rds.amazonaws.com;port=3306;dbname=assignment1',
			'info344user',
			'monkey854');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$data = $conn->query('SELECT * FROM BASKETBALL WHERE PlayerName LIKE ' . $conn->quote($player_name));
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

if ($data->rowCount() !== 0) {
	foreach($data as $row) {
		$player = $row[1];
		$gp = $row[2];
		$fgp = $row[3];
		$tpp = $row[4];
		$ftp = $row[5];
		$ppg = $row[6];
	}
	echo json_encode($row);
} else {
	echo "No basketball player(s) found with search query";
}
?>