<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "fts_db";

$connect = mysqli_connect($host, $user, $pass, $database);

if (!$connect)
{
    die('Error! Failed to connect to the database.');
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>