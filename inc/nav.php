<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary rounded-4 mt-2">
    <div class="container-fluid">
        <a class="navbar-brand me-4" href="index.php">
            <img src="logo/suppi-lg.png" alt="Suppi.fi" width="120" class="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-underline me-auto mb-1 mb-lg-0 nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>" aria-current="page" href="index.php">Etusivu</a>
                </li>
                <?php if (tarkistaKirjautuminen()) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'asiakas.php') ? 'active' : '' ?>" aria-current="page" href="asiakas.php">Asiakas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'tuote.php') ? 'active' : '' ?>" href="tuote.php">Tuote</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'myyja.php') ? 'active' : '' ?>" href="myyja.php">Myyjä</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Haku" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Hae</button>
            </form>
            <?php if (tarkistaKirjautuminen()) : ?>
                <a href="ulos.php" class="nav-link sign-in-link"><i class="bi bi-box-arrow-left sign-icon me-1"></i> Ulos</a>
            <?php else : ?>
                <a href="kirjaudu.php" class="nav-link sign-in-link"><i class="bi bi-box-arrow-in-right sign-icon me-1"></i> Kirjaudu</a>
            <?php endif; ?>
        </div>
    </div>
</nav>