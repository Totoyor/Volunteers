<?php include_once('views/layout/header.inc.php'); ?>

    <div class="container content-blog">
        <div class="row">
            <div class="col s12 m12">
                <div class="card-panel">
                    <h1>Lists of events</h1>

                    <?php
                    foreach ($data as $event) { ?>
                        <p>
                            <a href="event/show/<?= $event['idEvent']; ?>"><?= $event['nameEvent']; ?></a><br/>
                        </p>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>