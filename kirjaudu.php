<?php
include_once 'inc/header.php';
require_once 'inc/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $kayttajatunnus = $_POST['kayttajatunnus'];
    $salasana = $_POST['salasana'];

    //tietojen tarkastaminen

    $sql = "SELECT myyjaID, salasana FROM myyja WHERE kayttajatunnus = :kayttajatunnus";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':kayttajatunnus', $kayttajatunnus);
    $stmt->execute();

    $myyja = $stmt->fetch(PDO::FETCH_OBJ);

    if (password_verify($salasana, $myyja->salasana)) {
        $_SESSION['kirjautunut'] = true;
        $_SESSION['myyjaID'] = $myyja->myyjaID;
        $_SESSION['nimi'] = $myyja->nimi;

        header("Location: asiakas.php");
        exit;
    } else {
        $salasanaError = "Virheellinen salasana";
        $kayttajatunnusError = "Virheellinen käyttäjätunnus";
    }
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light shadow">
                <h3 class="fw-semibold text-center">Kirjaudu sisään</h3>
                <p class="mb-4 fs-6 fw-light text-center">Kirjaudu sisään jotta näkisit hallinta paneelin.</p>
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="kayttajatunnus" class="form-label">Käyttäjätunnus</label>
                        <input type="text" value="<?php echo (!empty($kayttajatunnus)) ? $kayttajatunnus : ''; ?>" class="form-control <?php echo (!empty($kayttajatunnusError)) ? 'is-invalid' : ''; ?>" name="kayttajatunnus" id="kayttajatunnus" placeholder="Kirjoita käyttäjätunnus">
                        <div class="invalid-feedback">
                            <small>
                                <?php echo $kayttajatunnusError; ?>
                            </small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="salasana" value="<?php echo (!empty($salasana)) ? $salasana : ''; ?>" class="form-label">Salasana</label>
                        <input type="password" class="form-control <?php echo (!empty($salasanaError)) ? 'is-invalid' : ''; ?>" name="salasana" id="salasana" placeholder="Kirjoita salasana">
                        <div class="invalid-feedback">
                            <small>
                                <?php echo $salasanaError; ?>
                            </small>
                        </div>
                    </div>

                    <div class="d-grid mx-auto col-sm-6">
                        <button class="btn btn-primary my-2" type="submit">Kirjaudu</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'inc/footer.php';
?>