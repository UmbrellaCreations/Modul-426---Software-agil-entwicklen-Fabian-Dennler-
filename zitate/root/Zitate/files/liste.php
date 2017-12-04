<?php
	header("Content-Type: text/html; charset=utf-8");
	include('session.php');
	require_once('functions.php');

	// Zur Datenbank verbinden, Datenbank auswählen
	require_once ('../inc/connect.php');
	//var_dump($_POST);
	// Delete Zitat

	if(isset($_POST['del'])) {
		deleteQuote($_POST['del'], $link);
		$_POST = array();
	} else if(isset($_POST['inputZitat']) && isset($_POST['inputAutor'])) {
		insertQuote($_POST['inputZitat'], $_POST['inputAutor'], $link);
		$_POST = array();
	}
	
	// Datenbank-Abfrage
	$abfrage = 'SELECT * FROM zitat';

	$res = mysqli_query ($link, $abfrage) or die('Fehler mysqli_query(): ' . mysqli_error($link));

	// Verbindung trennen
	mysqli_close ($link);
	
/*
Sample Unit Test 
function insertTest() {
	$id = insertQuote('test 123', '123 test');
	getQuote($id);
	assert(getQuote.Autor, '==', '123 test')
}
function deleteTest() {
	$id = insertQuote('redsad', 'das das');
	deleteQuote($id);
	getQuote($id)
	assert(getQuote == NULL)
}

*/
?>

<html>
	<head>
		<title>Liste</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="../css/liste.css">
	</head>
	<body>
		<div id="myDIV" class="header">
		
		<h1>Welcome <i>"<?php echo $login_session; ?>"</i></h1> 
		<a href ="logout.php"><div class="signout">Sign Out</div></a>
		
			<h2 style="margin:5px; margin-top:40px;">Zitatliste</h2>
			<form action = "liste.php" method = "post">
			  <input type="text" id="inputZitat" name = "inputZitat" placeholder="Zitat...">
			  <input type="text" id="inputAutor" name = "inputAutor" placeholder="Autor...">
			  <input type="submit"  value="add" class="addBtn">
			</form>
		</div>
		<div id="quote-list"></div>
		
		<script src="jquery.min.js"></script>
		<script>
		loadData();
		function loadData() {
			$("#quote-list").empty(); 
			$.getJSON( "data.php?all=1")
				.done(function( data ) {
					var items = [];
					$.each( data, function(key, val) {
					  items.push( "<li id='" + val.idZitat + "'>" + val.quote + "<br>" + val.autor + "<input type='button' name='delete' class='delBtn' value='X' data='"+val.idZitat+"'/>" + "</li>" );
					});
					  $( "<ul/>", {
						"class": "my-new-list",
						"id": "myUL",
						html: items.join( "" )
					  }).appendTo( "#quote-list" );
					  
					  
					$( ".delBtn" ).bind( "click", function() {
					  //alert( "User clicked on 'delBtn.'" + $( this ).attr("data"));
					  $.post( "liste.php", { del: $( this ).attr("data") } )
						  .done(function( data ) {
							loadData();
						  });
					});
				}
			);
		}
		</script>
	</body>
</html>
