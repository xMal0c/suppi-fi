<?php
$servername = "localhost";
$username = "vuokraamo";
$password = "M(g8[W2Q6ELOKvT6";
$db = 'vuokraamo';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
