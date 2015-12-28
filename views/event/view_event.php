<?php include_once('views/layout/header.inc.php'); ?>
<div class="container content-blog">
    <div class="row">
        <div class="col s12 m12">
            <div class="card-panel">
                <?php foreach ($data as $event) {
                    ?>
                    <?php if ($event['statusEvent'] == 1) {
                        $status = "publier";
                    } elseif ($event['statusEvent'] == 0) {
                        $status = "sauvegarder";
                    } ?>
                    <h1><?= $event['nameEvent']; ?></h1>
                    <p>Date de début : <?= $event['startEvent']; ?></p>
                    <p>Heure de début : <?= $event['hourStartEvent']; ?></p>
                    <p>Date de fin : <?= $event['endEvent']; ?></p>
                    <p>Heure de fin : <?= $event['hourEndEvent']; ?></p>
                    <p>Adresse : <?= $event['locationEvent']; ?></p>
                    <p>Description : <?= $event['descriptionEvent']; ?></p>
                    <p>Photo : <?= $event['coverPicture']; ?></p>
                    <p>Mission : <?= $event['missionName']; ?></p>
                    <p>Nombre de volontaire voulue : <?= $event['nbVolunteer']; ?></p>
                    <p>Status : <?= $status; ?></p>
                    <?php
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include_once('views/layout/footer.inc.php'); ?>

