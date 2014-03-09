<?php 

// $player_name = "%" . strtolower($_POST["name"]) . "%";
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
?>

<html>
<head>
	<title>Result page</title>
	<meta name="description" content="The results page">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css">
	<meta name="author" content="oscarw94">
</head>
<body>
	
	<div class="content">
			<?php
				
				if ($data->rowCount() !== 0) {
					echo '<table border="1">';
					echo '<tr>
									<th>Name</th>
									<th>GP</th>
									<th>FGP</th>
									<th>TPP</th>
									<th>FTP</th>
									<th>PPG</th>
									</tr>';
					echo '<tr>';
					
					foreach($data as $row) {		
						$player = $row[1];
						$gp = $row[2];
						$fgp = $row[3];
						$tpp = $row[4];
						$ftp = $row[5];
						$ppg = $row[6];
					
						echo '<td>', $player, '</td>
							  <td>', $gp, '</td>
							  <td>', $fgp, '</td>
							  <td>', $tpp, '</td>
							  <td>', $ftp, '</td>
							  <td>', $ppg, '</td>
							  </tr>';
					}
					
					echo '</table>';
				} else {

					echo "No basketball player(s) found with search query";
				}
			?>
	</div>
	
	<a href="index.php"><p><img class="back" src="img/nbalogo.png" alt="logo1"></p></a>	
</body>
</html>