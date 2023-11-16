<?php include_once 'inc/header.php'; ?>

<!--
<div class="banner-background">
    <div class="container text-center">
        <h1 class="fw-semibold text-white text-shadow">Lähde laineille Suppi.fi:n kanssa!</h1>
    </div>
</div>
-->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 mb-4 card-body">
            <p>Tervetuloa Suppi.fi:lle – sinun ykköslähtöpaikkasi vesiseikkailuun! <br>Vuokraamme laadukkaat SUP-laudat ja kaikki tarvittavat varusteet, jotta voit nauttia vesistä turvallisesti ja tyylillä. Olipa suunnitelmissasi rento lipuminen järvellä tai aktiivinen melontaretki joella, meiltä löydät kaiken tarpeellisen täydellisen päivän viettoon vesillä. <br><br>Tutustu valikoimaamme ja varaa oma suppailukokemuksesi jo tänään!</p>
            <a href="varaus.html" class="btn btn-primary">Vuokraa</a>

        </div>

        <!-- Karuselli -->
        <div class="col-md-6 mb-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner rounded-2 shadow-lg">
                    <div class="carousel-item active">
                        <img src="./banner/caro1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./banner/caro2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./banner/caro3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'inc/footer.php'; ?>