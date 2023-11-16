<?php
include_once 'inc/header.php';

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

if (!empty($_POST)) {


    //Luetaan lomake tiedot muuttujiin
    $nimi = $_POST['nimi'];
    $kayttajatunnus = $_POST['kayttajatunnus'];
    $salasana = $_POST['salasana'];
    $rooli = $_POST['rooli'];

    //Puuttuvien kenttien ohjetekstit
    $nimiError = '';
    $kayttajatunnusError = '';
    $salasanaError = '';
    $rooliError = '';


    //Oletetaan että käyttäjä syöttää kaikki tiedot
    $valid = true;

    if (empty($nimi)) {
        $valid = false;
        $nimiError = 'Syötä myyjän nimi';
    }
    if (empty($kayttajatunnus)) {
        $valid = false;
        $kayttajatunnusError = 'Syötä käyttäjätunnus';
    }
    if (empty($salasana)) {
        $valid = false;
        $salasanaError = 'Syötä salasana';
    }
    if (empty($rooli)) {
        $valid = false;
        $rooliError = 'Syötä myyjän rooli';
    }

    if ($valid) {
        require_once 'inc/database.php';

        $sql = "INSERT INTO myyja (nimi, kayttajatunnus, salasana, rooli) VALUES (:nimi, :kayttajatunnus, :salasana, :rooli)";

        $salasana = password_hash($salasana, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nimi', $nimi);
        $stmt->bindParam(':kayttajatunnus', $kayttajatunnus);
        $stmt->bindParam(':salasana', $salasana);
        $stmt->bindParam(':rooli', $rooli);
        $stmt->execute();

        header('Location: myyja.php');
        exit;
    }
}
?>

<div class="row mt-2">
    <div class="col-8 mx-auto">
        <div class="card card-body bg-light mt-3 shadow">
            <h3>Myyjän tietojen lisääminen</h3>
            <form action="lisaa_myyja.php" method="post" class="mt-4">
                <div class="mb-3 row">
                    <label for="nimi" class="col-sm-3 col-form-label">Myyjän nimi</label>
                    <div class="col-sm-9">
                        <input type="text" name="nimi" class="form-control
                        <?php echo (!empty($nimiError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($nimi)) ? $nimi : '' ?>">
                        <?php if (!empty($nimiError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $nimiError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kayttajatunnus" class="col-sm-3 col-form-label">Käyttäjätunnus</label>
                    <div class="col-sm-9">
                        <input type="text" name="kayttajatunnus" class="form-control
                        <?php echo (!empty($kayttajatunnusError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($kayttajatunnus)) ? $kayttajatunnus : '' ?>">
                        <?php if (!empty($kayttajatunnusError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $kayttajatunnusError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- SALASANA -->
                <div class="mb-3 row">
                    <label for="salasana" class="col-sm-3 col-form-label">Salasana</label>
                    <div class="col-sm-9">
                        <input type="password" id="salasana" name="salasana" class="form-control
        <?php echo (!empty($salasanaError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($salasana)) ? $salasana : ''; ?>">
                        <?php if (!empty($salasanaError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $salasanaError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                        <!-- Boksi -->
                        <input type="checkbox" id="show_password" style="margin-top:10px;" />
                        <label for="show_password">Näytä salasana</label>
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="rooli" class="col-sm-3 col-form-label">Myyjän rooli</label>
                    <div class="col-sm-9">
                        <input type="text" name="rooli" class="form-control
                        <?php echo (!empty($rooliError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($rooli)) ? $rooli : '' ?>">
                        <?php if (!empty($rooliError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $rooliError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-success" type="submit">Tallenna</button>
                    <a href="myyja.php" class="btn btn-primary">Peruuta</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once 'inc/footer.php';
