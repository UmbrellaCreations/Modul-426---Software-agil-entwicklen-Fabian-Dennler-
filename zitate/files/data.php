<?php
//setting header to json
header('Content-Type: application/json; charset=utf-8');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'usbw');
define('DB_NAME', 'zitate');
define('DB_PORT', '3307');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
if(isset($_GET["all"])) {
	//query to get data from the table
	$query = sprintf("SELECT * FROM zitat ORDER BY autor");
} else  {
	//query to get data from the table
	$query = sprintf("SELECT * FROM zitat ORDER BY RAND() LIMIT 1");
}

//execute query

$result = $mysqli->query($query);

while ($row	 = $result->fetch_assoc()) {
  $data[] = $row;
}

//free memory associated with result
$result->close();


//close connection
$mysqli->close();

//now print the data
print json_encode($data);