<?php
	
	function deleteQuote($id, $link) {
		$rowId = mysqli_real_escape_string($link,$id);
		// Datenbank Zitat löschen query
		$removeQuote = "DELETE from zitat WHERE idZitat = '$rowId'";
		$res = mysqli_query ($link, $removeQuote) or die('Fehler mysqli_query(): ' . mysqli_error($link));
	}

	function getQuote($id, $link) {
		$rowId = mysqli_real_escape_string($link,$id);
		// Datenbank Zitat löschen query
		$removeQuote = "SELECT * from zitat WHERE idZitat = '$rowId'";
		$res = mysqli_query ($link, $removeQuote) or die('Fehler mysqli_query(): ' . mysqli_error($link));
	}

	
	function insertQuote($quote, $autor, $geb, $link) {		
		$zitat = mysqli_real_escape_string($link,$quote);
		$autor = mysqli_real_escape_string($link,$autor);
		$geb = mysqli_real_escape_string($link,$geb);
		
		if (($zitat != "" ) && ($autor != "" ) && ($geb != "")){
			// Datenbank-Abfrage
			$addQuote = "INSERT INTO zitat (`quote` ,`autor`,`GeburtstagAutor`) VALUES ('$zitat', '$autor', '$geb')";
			$res = mysqli_query ($link, $addQuote) or die('Fehler mysqli_query(): ' . mysqli_error($link));
			return mysql_insert_id();
		};
	}
