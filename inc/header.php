<?php
session_start();
require_once 'funktiot.php';
$nykyinen_sivu = basename($_SERVER['PHP_SELF']);

if (!tarkistaKirjautuminen() && $nykyinen_sivu != 'index.php' && $nykyinen_sivu != 'kirjaudu.php') {
    header('Location: index.php');
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suppi.fi – Vuokraa ja lähde laineille</title>
    <link rel="icon" type="image/x-icon" href="logo/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once 'nav.php';
    ?>

    <?php if ($nykyinen_sivu == 'index.php') : ?>
        <div class="banner-background mt-2">
            <div class="container text-center">
                <h1 class="fw-semibold text-white text-shadow">Lähde laineille Suppi.fi:n kanssa!</h1>
            </div>
        </div>
    <?php endif; ?>

    <div class="container mt-4">