<?php
include_once 'inc/header.php';
?>
<div class="row">
    <h3>Asiakastiedot</h3>
</div>
<div class="row">
    <p>
        <a href="lisaa_asiakas.php" class="btn btn-outline-success">Lisää Asiakas</a>
    </p>

    <div class="d-flex justify-content-end" role="search">
        <input type="text" class="form-control w-25 me-2" name="hakusana" placeholder="Hae asiakas" id="hakusana">
        <button class="btn btn-outline-success" id="asiakasHaku">Hae</button>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Etunimi</th>
                <th>Sukunimi</th>
                <th>Sähköposti</th>
                <th>Toiminnot</th>
            </tr>
        </thead>
        <tbody id="asiakastiedot">
            <?php
            //Luodaan yhteys tietokantaan & haetaan asiakastietoja
            require_once 'inc/database.php';
            $sql = 'SELECT * FROM asiakas';
            $result = $pdo->query($sql);

            while ($row = $result->fetch()) :
            ?>
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
        </tbody>
    </table>
</div>
</div>

<?php

include_once 'inc/footer.php';
