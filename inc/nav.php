<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="img/suppi-lg.png" alt="Suppi" width="60" class="mb-1">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-underline me-auto mb-1 mb-lg-0 nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'asiakas.php') ? 'active' : '' ?>" aria-current="page" href="asiakas.php">Asiakas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'tuote.php') ? 'active' : '' ?>" href="tuote.php">Tuote</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Etsi" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Etsi</button>
            </form>
        </div>
    </div>
</nav>