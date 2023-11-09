<?php
require_once 'inc/database.php';


$asiakasID = null;

if (!empty($_GET['asiakasID'])) {
    $asiakasID = $_REQUEST['asiakasID'];
}

if ($asiakasID === null) {
    header('Location: asiakas.php');
    exit;
}

$sql = 'SELECT * FROM asiakas WHERE asiakasID = :asiakasID';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':asiakasID', $asiakasID);
$stmt->execute();

$asiakas = $stmt->fetch(PDO::FETCH_OBJ);

require_once 'inc/header.php';
?>

<div class="row mt-2">
    <div class="col-8 mx-auto">
        <div class="card card-body bg-light mt-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Asiakastietojen katsominen</h3>
                <a href="asiakas.php" class="btn btn-primary">Takaisin</a>
            </div>
            <form class="mt-4">
                <div class="row mb-3">
                    <label for="etunimi" class="col-sm-3 col-form-label">Etunimi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $asiakas->etunimi; ?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sukunimi" class="col-sm-3 col-form-label">Sukunimi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $asiakas->sukunimi; ?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lahiosoite" class="col-sm-3 col-form-label">Lähiosoite</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $asiakas->lahiosoite; ?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="postinumero" class="col-sm-3 col-form-label">Postinumero</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $asiakas->postinumero; ?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="postitoimipaikka" class="col-sm-3 col-form-label">Postitoimipaikka</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $asiakas->postitoimipaikka; ?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sahkoposti" class="col-sm-3 col-form-label">Sähköposti</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $asiakas->sahkoposti; ?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="puhelin" class="col-sm-3 col-form-label">Puhelin</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $asiakas->puhelin; ?>" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'inc/footer.php';
