<?php include_once('views/layout/header.inc.php'); ?>

<div class="container content-blog">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/blog/fond.jpg">
                    <span class="card-title"><?php echo $data['post_title']; ?></span>
                </div>
                <div class="card-content">
                    <p><?php echo $data['post_content']; ?></p>
                </div>
                <div class="card-action">
                    <span>Date de publication : <?php echo $data['post_date']; ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <h3>Commentaires</h3>
        </div>
    </div>
    <?php foreach($comments as $commentaire) { ?>
    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-grey lighten-5">
                <div class="card-content white-text">
                    <span class="card-title black-text"><?php echo $commentaire['comment_author'] ?> :</span>
                    <p class="black-text"><?php echo $commentaire['comment_content'] ?></p>
                </div>
                <div class="card-action">
                    <span class="black-text">Date : <?php echo $commentaire['comment_date'] ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include_once('views/layout/footer.inc.php'); ?>


