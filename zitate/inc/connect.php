<?php
// Datenbank-Server verbinden und Datenbank wählen
$host = "localhost:3307";
$user = "m426";
$password = "test123";
$datenbank = "zitate";

$link = mysqli_connect($host, $user, $password, $datenbank);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($verbindung, "utf8");