<?php
include_once 'inc/header.php';
?>
<div class="row">
    <h3>Tuotteet</h3>
</div>
<div class="row">
    <p>
        <a href="lisaa_tuote.php" class="btn btn-outline-success">Lisää tuote</a>
    </p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tuottteen nimi</th>
                <th>Kuvaus</th>
                <th>Painoraja</th>
                <th>Määrä</th>
                <th>Kuva</th>
                <th>Toiminnot</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Luodaan yhteys tietokantaan & haetaan asiakastietoja
            require_once 'inc/database.php';
            $sql = 'SELECT * FROM tuote';
            $result = $pdo->query($sql);

            while ($row = $result->fetch()) :
                $kuva = base64_encode($row['kuva']);
                $src = 'data:image/jpeg;base64,' . $kuva;
            ?>
                <tr>
                    <td><?php echo $row['tuoteID']; ?></td>
                    <td><?php echo $row['nimi']; ?></td>
                    <td><?php echo $row['kuvaus']; ?></td>
                    <td><?php echo $row['painoraja']; ?></td>
                    <td><?php echo $row['kpl']; ?></td>
                    <td>
                        <img src="img/<?php echo $row['kuva']; ?>" alt="<?php echo $row['kuva']; ?>" width=80px>
                    </td>
                    <td>
                        <a href="paivita_tuote.php?tuoteID=<?php echo $row['tuoteID']; ?>" class="btn btn-success">Päivitä</a>
                        <a href="katso_tuote.php?tuoteID=<?php echo $row['tuoteID']; ?>" class="btn btn-primary">Katso</a>
                        <a href="poista_tuote.php?tuoteID=<?php echo $row['tuoteID']; ?>" class="btn btn-danger">Poista</a>
                    </td>
                </tr>

            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</div>

<?php

include_once 'inc/footer.php';
