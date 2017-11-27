<?php
	header("Content-Type: text/html; charset=utf-8");
?>
<html lang="de">
	<head>
		<title>Zitate</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>

	<body>
		<div class="page">
			<div class="content">
				<h1 id="quote">Zitat</h1>
				<h2 id="autor">Autor</h2>
			</div>
		</div>
		
		<div class="footer">
			<p>Umbrella-Creations 2017 &copy; <a href="files/login.php">Login</a></p>
		</div>
	</body>
	
	<script src="files/jquery.min.js"></script>
    <script>	
		$.getJSON( "files/data.php")
		.done(function( data ) {
			$( "#quote" ).text(data[0].quote);
			$( "#autor" ).text(data[0].autor);
		});
		setInterval(function(){
			$.getJSON( "files/data.php")
				.done(function( data ) {
				 $( "#quote" ).text(data[0].quote);
				 $( "#autor" ).text(data[0].autor);
				});
		},5000);
	</script>
</html>