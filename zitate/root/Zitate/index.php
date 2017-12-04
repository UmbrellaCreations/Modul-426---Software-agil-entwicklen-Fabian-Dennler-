<?php
	header("Content-Type: text/html; charset=utf-8");
?>
<html lang="de">
	<head>
		<title>Zitate</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>

	<body>
		<div class="bg">
			<div class="page">
				<div class="content">
					<div class='zitat'>
						<h1 id="quote">Zitat</h1>
					</div>
					
					<div class='autor'>
						<h2 id="autor">Autor</h2>
					</div>
					
					<div class='views'>
						<p>Anzahl Views:</p>
						<p id="views">Views</p>
					</div>
					
					<div class="birthday">
						<p id="birthdayAutor">xx.xx.xxxx</p>
					</div>
					
					<div class="anzahlZitate">
						<p>Anzahl Zitate:</p>
						<p id="nrOfQuotes">!!!Anzahl Zitate!!!</p>
						<p> | </p>
						<p>Anzahl Autoren:</p>
						<p id="nrOfAutors">!!!Anzahl Autoren!!!</p>
					</div>
					
					<div class="like">
						<p id="nrOfLikes">!!!Like!!!</p>
						<input type='button' name='like' value="Like" class='likeBtn' id='idZitat'/>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer">
			<p>Umbrella-Creations 2017 &copy; <a href="files/login.php">Login</a></p>
		</div>
	</body>
	
	<script src="files/jquery.min.js"></script>
    <script>	
	loadData();
	function loadData() {
		$( ".likeBtn" ).show();
		$( ".likeBtn" ).bind( "click", function() {
			$(this).hide();
			$.get( "files/data.php", { adLike: $( this ).attr("data") } )
				.done(function( data ) {
					$( "#nrOfLikes" ).text(data[0].likes);
			});
			});
			$.getJSON("files/data.php")
			.done(function( data ) {
				$( "#idZitat" ).attr("data", data[0].idZitat);
				$( "#quote" ).text(data[0].quote);
				$( "#autor" ).text(data[0].autor);
				$( "#nrOfLikes" ).text(data[0].likes);
				$( "#birthdayAutor" ).text(data[0].GeburtstagAutor);
				$.get( "files/data.php", { adView: data[0].idZitat } )
				$( "#views" ).text(data[0].views);
			});
			$.getJSON("files/data.php?countQuote")
			.done(function( data ) {
				$( "#nrOfQuotes" ).text(data[0].AnzahlZitate);
			});
			$.getJSON("files/data.php?countAutors")
			.done(function( data ) {
				$( "#nrOfAutors" ).text(data[0].AnzahlAutoren);
			});
			setInterval(function(){
				$.getJSON( "files/data.php")
				.done(function( data ) {
					 $( "#idZitat" ).attr("data", data[0].idZitat);
					 $( "#quote" ).text(data[0].quote);
					 $( "#autor" ).text(data[0].autor);
					 $( "#nrOfLikes" ).text(data[0].likes);
					 $( "#birthdayAutor" ).text(data[0].GeburtstagAutor);
					 $.get( "files/data.php", { adView: data[0].idZitat } )
					 $( "#views" ).text(data[0].views);
					 $( ".likeBtn" ).show();
					});
						$.getJSON("files/data.php?countQuote")
				.done(function( data ) {
						$( "#nrOfQuotes" ).text(data[0].AnzahlZitate);
					});
				$.getJSON("files/data.php?countAutors")
				.done(function( data ) {
						$( "#nrOfAutors" ).text(data[0].AnzahlAutoren);
					});
			},5000);
	};
	</script>
</html>