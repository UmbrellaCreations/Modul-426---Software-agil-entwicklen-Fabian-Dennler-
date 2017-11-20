<?php

error_reporting(E_ALL);

// Datenbank-Server verbinden und Datenbank wählen
$host = "localhost";
$user = "root";
$password = "usbw";
$datenbank = "zitate";
$port = "3307";

$link = mysqli_connect($host, $user, $password, $datenbank, $port);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($link, "utf8");