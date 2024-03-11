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
    <link rel="stylesheet" href="css/carousel.css">
</head>

<body>
    <?php include_once 'nav.php';
    ?>
    <?php if ($nykyinen_sivu == 'index.php') : ?>
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img-1" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Tervetuloa Suppi.fi:lle</h1>
                            <p class="opacity-75">Suppi.fi on sinun ykköslähtöpaikkasi vesiseikkailuun!</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Lue lisää</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img-2" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Sinä vuokraat, me mahdollistamme!</h1>
                            <p>Vuokraamme laadukkaat SUP-laudat ja kaikki tarvittavat varusteet, jotta voit nauttia vesistä turvallisesti ja tyylillä.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Lue lisää</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img-3" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Rento vai aktiivinen?</h1>
                            <p>Olipa suunnitelmissasi rento lipuminen järvellä tai aktiivinen melontaretki joella, meiltä löydät kaiken tarpeellisen täydellisen päivän viettoon vesillä. <br><br>Tutustu valikoimaamme ja varaa oma suppailukokemuksesi jo tänään!</p>
                            </p>
                            <p><a class="btn btn-lg btn-primary" href="#">Tutustu valikoimaan</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    <?php endif; ?>
    <div class="navseparator"></div>

    <div class="container mt-4">