<?php
include_once 'inc/header.php';

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

if (!empty($_POST)) {
    // var_dump($_POST);

    //Luetaan lomake tiedot muuttujiin
    $etunimi = $_POST['etunimi'];
    $sukunimi = $_POST['sukunimi'];
    $lahiosoite = $_POST['lahiosoite'];
    $postinumero = $_POST['postinumero'];
    $postitoimipaikka = $_POST['postitoimipaikka'];
    $sahkoposti = $_POST['sahkoposti'];
    $puhelin = $_POST['puhelin'];

    //Puuttuvien kenttien ohjetekstit
    $etunimiError = '';
    $sukunimiError = '';
    $lahiosoiteError = '';
    $postinumeroError = '';
    $postitoimipaikkaError = '';
    $sahkopostiError = '';
    $puhelinError = '';

    //Oletetaan että käyttäjä syöttää kaikki tiedot
    $valid = true;

    if (empty($etunimi)) {
        $valid = false;
        $etunimiError = 'Syötä etunimi';
    }
    if (empty($sukunimi)) {
        $valid = false;
        $sukunimiError = 'Syötä sukunimi';
    }
    if (empty($lahiosoite)) {
        $valid = false;
        $lahiosoiteError = 'Syötä lähisoite';
    }
    if (empty($postinumero)) {
        $valid = false;
        $postinumeroError = 'Syötä postinumero';
    }
    if (empty($postitoimipaikka)) {
        $valid = false;
        $postitoimipaikkaError = 'Syötä postitoimipaikka';
    }
    if (empty($sahkoposti)) {
        $valid = false;
        $sahkopostiError = 'Syötä sähköposti';
    }
    if (empty($puhelin)) {
        $valid = false;
        $puhelinError = 'Syötä puhelinnumero';
    }

    if ($valid) {
        require_once 'inc/database.php';

        $sql = "INSERT INTO asiakas (etunimi, sukunimi, lahiosoite, postinumero, postitoimipaikka, sahkoposti, puhelin) VALUES (:etunimi, :sukunimi, :lahiosoite, :postinumero, :postitoimipaikka, :sahkoposti, :puhelin)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':etunimi', $etunimi);
        $stmt->bindParam(':sukunimi', $sukunimi);
        $stmt->bindParam(':lahiosoite', $lahiosoite);
        $stmt->bindParam(':postinumero', $postinumero);
        $stmt->bindParam(':postitoimipaikka', $postitoimipaikka);
        $stmt->bindParam(':sahkoposti', $sahkoposti);
        $stmt->bindParam(':puhelin', $puhelin);
        $stmt->execute();

        header('Location: asiakas.php');
        exit;
    }
}
?>

<div class="row mt-2">
    <div class="col-8 mx-auto">
        <div class="card card-body bg-light mt-3">
            <h3>Asiakastietojen lisääminen</h3>
            <form action="lisaa_asiakas.php" method="post" class="mt-4">
                <div class="mb-3 row">
                    <label for="etunimi" class="col-sm-3 col-form-label">Etunimi</label>
                    <div class="col-sm-6">
                        <input type="text" name="etunimi" class="form-control
                        <?php echo (!empty($etunimiError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($etunimi)) ? $etunimi : '' ?>">
                        <?php if (!empty($etunimiError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $etunimiError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sukunimi" class="col-sm-3 col-form-label">Sukunimi</label>
                    <div class="col-sm-6">
                        <input type="text" name="sukunimi" class="form-control
                        <?php echo (!empty($sukunimiError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($sukunimi)) ? $sukunimi : '' ?>">
                        <?php if (!empty($sukunimiError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $sukunimiError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="lahiosoite" class="col-sm-3 col-form-label">Lähiosoite</label>
                    <div class="col-sm-6">
                        <input type="text" name="lahiosoite" class="form-control
                        <?php echo (!empty($lahiosoiteError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($lahiosoite)) ? $lahiosoite : '' ?>">
                        <?php if (!empty($lahiosoiteError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $lahiosoiteError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="postinumero" class="col-sm-3 col-form-label">Postinumero</label>
                    <div class="col-sm-6">
                        <input type="text" name="postinumero" class="form-control
                        <?php echo (!empty($postinumeroError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($postinumero)) ? $postinumero : '' ?>">
                        <?php if (!empty($postinumeroError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $postinumeroError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="postitoimipaikka" class="col-sm-3 col-form-label">Postitoimipaikka</label>
                    <div class="col-sm-6">
                        <input type="text" name="postitoimipaikka" class="form-control
                        <?php echo (!empty($postitoimipaikkaError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($postitoimipaikka)) ? $postitoimipaikka : '' ?>">
                        <?php if (!empty($postitoimipaikkaError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $postitoimipaikkaError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sahkoposti" class="col-sm-3 col-form-label">Sähköposti</label>
                    <div class="col-sm-6">
                        <input type="text" name="sahkoposti" class="form-control
                        <?php echo (!empty($sahkopostiError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($sahkoposti)) ? $sahkoposti : '' ?>">
                        <?php if (!empty($sahkopostiError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $sahkopostiError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="puhelin" class="col-sm-3 col-form-label">Puhelin</label>
                    <div class="col-sm-6">
                        <input type="text" name="puhelin" class="form-control
                        <?php echo (!empty($puhelinError)) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($puhelin)) ? $puhelin : '' ?>">
                        <?php if (!empty($puhelinError)) : ?>
                            <div class="invalid-feedback">
                                <small>
                                    <?php echo $puhelinError; ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit">Tallenna</button>
                    <a href="asiakas.php" class="btn btn-primary">Peruuta</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once 'inc/footer.php';
