<?php
	header("Content-Type: text/html; charset=utf-8");
	include('session.php');
	
	// Zur Datenbank verbinden, Datenbank auswählen
	require_once ('../inc/connect.php');
	
	// Datenbank-Abfrage
	$abfrage = 'SELECT * FROM zitat';

	$res = mysqli_query ($link, $abfrage) or die('Fehler mysqli_query(): ' . mysqli_error($link));

	// Verbindung trennen
	mysqli_close ($link);


?>

<html>
	<head>
		<title>Liste</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="liste.css">
	</head>
		<body>

		<div id="myDIV" class="header">
		  <h2 style="margin:5px">Zitatliste</h2>
		  <input type="text" id="inputZitat" placeholder="Zitat...">
		  <input type="text" id="inputAutor" placeholder="Autor...">
		  <span onclick="newElement()" class="addBtn">hinzufügen</span>
		</div>
		<div id="quote-list"></div>
		
		<script src="jquery.min.js"></script>
		<script>	
			$.getJSON( "data.php?all=1")
				.done(function( data ) {
					console.log(data);
					var items = [];
				    $.each( data, function(key, val) {
						console.log(val);
					  items.push( "<li id='" + val.idZitat + "'>" + val.quote + "<br>" + val.autor + "<span class='close'>\u00D7</span>" + "</li>" );
				    });
					
					  $( "<ul/>", {
						"class": "my-new-list",
						"id": "myUL",
						html: items.join( "" )
					  }).appendTo( "#quote-list" );
   				}
			);
		</script>
		
		<h1>Welcome <?php echo $login_session; ?></h1> 
		<h2><a href = "logout.php">Sign Out</a></h2>
		
		<script>
		
		// Create a "close" button and append it to each list item
		var myNodelist = document.getElementsByTagName("LI");
		var i;
		for (i = 0; i < myNodelist.length; i++) {
		  var span = document.createElement("SPAN");
		  var txt = document.createTextNode("\u00D7");
		  
		  span.className = "close";
		  
		  span.appendChild(txt);
		  
		  // set div and set autor
		  var div = document.createElement("DIV");
		  var txt = document.createTextNode("");
		  
		  // Set text in div
		  div.appendChild(txt);
		  
		  myNodelist[i].appendChild(span);
		  
		  // Put in div
		  myNodelist[i].appendChild(div);
		}
		
		// Click on a close button to hide the current list item
		var close = document.getElementsByClassName("close");
		var i;
		for (i = 0; i < close.length; i++) {
		  close[i].onclick = function() {
			var div = this.parentElement;
			div.style.display = "none";
		  }
		}

		// Create a new list item when clicking on the "Add" button
		function newElement() {
			<?php
				// Zur Datenbank verbinden, Datenbank auswählen
				require_once ('../inc/connect.php');

				// Datenbank-Abfrage
				$addQuote = 'INSERT INTO  `zitate`.`zitat` (`quote` ,`autor`)VALUES (inputZitat,  inputAutor,)';
				$res = mysqli_query ($link, $addQuote) or die('Fehler mysqli_query(): ' . mysqli_error($link));

				// Verbindung trennen
				mysqli_close ($link);
			?>
		
		  var li = document.createElement("li");
		  
		  var inputZitat = document.getElementById("inputZitat").value;
		  var inputAutor = document.getElementById("inputAutor").value;
		  
		  var z = document.createTextNode(inputZitat);
		  
		  li.appendChild(z);
		  
		  if (inputZitat === '' || inputAutor === '') {
			alert("Die Felder dürfen nicht leer sein!");
		  } else {
			document.getElementById("myUL").appendChild(li);
			

			
		  }
		  document.getElementById("inputZitat").value = "";
		  document.getElementById("inputAutor").value = "";
		  

		  var span = document.createElement("SPAN");
		  var txt = document.createTextNode("\u00D7");
		  
		  var div = document.createElement("DIV");
		  div.className = "secondLine";
		  var txtBla = document.createTextNode(inputAutor);
		  
		  // Delete Button
		  span.className = "close";
		  span.appendChild(txt);
		  
		  // Set Autor
		  div.appendChild(txtBla);
		  
		  li.appendChild(span);
		  li.appendChild(div);

		  // Delete input
		  for (i = 0; i < close.length; i++) {
			close[i].onclick = function() {
			  var div = this.parentElement;
			  this.parentNode.removeChild(this);
			}
		  }
		}
		
		var listItems = document.getElementsByClass("close"); // or document.querySelectorAll("li"); 
		for (var i = 0; i < listItems.length; i++) {
		  listItems[i].onclick = function() {this.parentNode.removeChild(this);}
		}
		
		</script>

	</body>
</html>
