<?php
session_start();

if (!isset($_SESSION['kirjautunut']) || $_SESSION['kirjautunut'] != true) {
    header("Location: index.php");
    exit;
}


require_once 'inc/database.php';


// http://localhost/vuokraamo/asiakashaku.php?hakusana=Matti
$hakusana = $_GET['hakusana'];

$sql = "SELECT * FROM asiakas
        WHERE CONCAT(etunimi, ' ', sukunimi) LIKE :hakusana";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':hakusana', "%$hakusana%");
$stmt->execute();

while ($row = $stmt->fetch()) : ?>
    <tr>
        <td><?php echo $row['asiakasID']; ?></td>
        <td><?php echo $row['etunimi']; ?></td>
        <td><?php echo $row['sukunimi']; ?></td>
        <td><?php echo $row['sahkoposti']; ?></td>
        <td>
            <a href="paivita_asiakas.php?asiakasID=<?php echo $row['asiakasID']; ?>" class="btn btn-success">Päivitä</a>
            <a href="katso_asiakas.php?asiakasID=<?php echo $row['asiakasID']; ?>" class="btn btn-primary">Katso</a>
            <a href="poista_asiakas.php?asiakasID=<?php echo $row['asiakasID']; ?>" class="btn btn-danger">Poista</a>
        </td>
    </tr>

<?php endwhile; ?>