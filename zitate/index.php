<?php
header("Content-Type: text/html; charset=utf-8");

// Zur Datenbank verbinden, Datenbank auswählen
require_once ('inc/connect.php');

// Datenbank-Abfrage
$abfrage = 'SELECT * FROM zitat';
$res = mysqli_query ($link, $abfrage) or die('Fehler mysqli_query(): ' . mysqli_error($link));

// Verbindung trennen
mysqli_close ($link);
?>

<!DOCTYPE html>
<html lang="de-CH">
	<head>
	
		<title>Zitate</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="css/styles.css">
		
	</head>

	<body>
		<div class="page">
			<div class="content">
				<div class="zitat">
					<?php
					while ($row = mysqli_fetch_assoc($res)) {
						echo "<h1>";
							echo $row['quote'];
						echo "</h1>";
					}
					?>
				</div>
				
				<div class="autor">
					<?php
					while ($row = mysqli_fetch_assoc($res)) {
						echo "<h2>";
							echo $row['autor'];
						echo "</h2>";
					}
					?>
				</div>
			</div>
			
			<div class="footer">
				<p>Umbrella-Creations 2017 &copy; <a href="files/login.php">Login</a></p>
			</div>
		</div>
	</body>
</html>