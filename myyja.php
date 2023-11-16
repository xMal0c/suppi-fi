<?php
include_once 'inc/header.php';
?>
<div class="row">
    <h3>Myyjän tiedot</h3>
</div>
<div class="row">
    <p>
        <a href="lisaa_myyja.php" class="btn btn-outline-success">Lisää Myyjä</a>
    </p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nimi</th>
                <th>Kayttäjätunnus</th>
                <th>Salasana</th>
                <th>Rooli</th>
                <th>Toiminnot</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Luodaan yhteys tietokantaan & haetaan asiakastietoja
            require_once 'inc/database.php';
            $sql = 'SELECT * FROM myyja';
            $result = $pdo->query($sql);

            while ($row = $result->fetch()) :
            ?>
                <tr>
                    <td><?php echo $row['myyjaID']; ?></td>
                    <td><?php echo $row['nimi']; ?></td>
                    <td><?php echo $row['kayttajatunnus']; ?></td>
                    <td>••••••••</td>
                    <td><?php echo $row['rooli']; ?></td>
                    <td>
                        <a href="paivita_asiakas.php?asiakasID=<?php echo $row['asiakasID']; ?>" class="btn btn-success">Päivitä</a>
                        <a href="poista_asiakas.php?asiakasID=<?php echo $row['asiakasID']; ?>" class="btn btn-danger">Poista</a>
                    </td>
                </tr>

            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</div>

<?php

include_once 'inc/footer.php';
