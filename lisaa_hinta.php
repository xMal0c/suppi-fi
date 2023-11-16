<?php
include_once 'inc/header.php';
require_once 'inc/database.php';

//sivulla käytettävät muuttujat
$kesto = '';
$hinta = '';
$tuoteID = '';

$sql = 'SELECT tuoteID, nimi FROM tuote ORDER BY nimi ASC';
$result = $pdo->query($sql);

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!empty($_POST)) {

    $kesto = $_POST['kesto'];
    $hinta = $_POST['hinta'];
    $tuoteID = $_POST['tuoteID'];

    //tietojen tarkempi tarkistaminen
    $valid = true;

    if ($valid) {
        $sql = 'INSERT INTO hinta (tuoteID, kesto, hinta) VALUES (:tuoteID, :kesto, :hinta)';

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':tuoteID', $tuoteID);
        $stmt->bindParam(':kesto', $kesto);
        $stmt->bindParam(':hinta', $hinta);
        $stmt->execute();
        header("Location: hinta.php");
        exit;
    }
} else {

    //yleiset virhetekstit
    $kestoError = 'Syötä keston määrä';
    $hintaError = 'Syötä hinta';
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="card card-body bg-light shadow">
                <h3 class="text-center mb-4">Tuotteen hintojen lisääminen</h3>
                <form action="" method="POST" class="needs-validation" novalidate>

                    <div class="mb-3">
                        <label for="tuote" class="form-label">Tuote</label>
                        <select name="tuoteID" class="form-select">
                            <?php while ($row = $result->fetch()) : ?>

                                <option <?php echo ($row['tuoteID'] == $tuoteID) ? 'selected' : ''; ?> value="<?php echo $row['tuoteID']; ?>"><?php echo $row['nimi']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <?php echo luoInputKentta('Kesto (min)', 'kesto', $kesto ?? '', $kestoError ?? '', 'text'); ?>
                    <?php echo luoInputKentta('Hinta', 'hinta', $hinta ?? '', $hintaError ?? '', 'text'); ?>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Tallenna</button>
                        <a href="tuote.php" class="btn btn-danger">Peruuta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'inc/footer.php';
?>