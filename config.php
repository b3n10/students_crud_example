<?php

$dbDriver = "sqlite";
$dbHost = "locahost";
$dbName = "university.db";
$dbUsername = "";
$dbPassword = "";

$dsn = $dbDriver . ":" . $dbName;

try {
  $pdo = new PDO($dsn, $dbUsername, $dbPassword);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

