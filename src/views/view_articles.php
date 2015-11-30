<?php include_once('views/layout/header.inc.php'); ?>

    <div class="container content-blog">
        <!-- Page Content goes here -->

        <?php foreach($data as $article) { ?>

            <div class="row">
                <div class="col s12 m12">
                    <div class="card grey lighten-4">
                        <div class="card-content black-text">
                        <span class="card-title">
                            <a href="?module=post&action=post&id=<?php echo $article['post_ID'] ?>">
                                <?php echo $article['post_title']; ?>
                            </a>
                        </span>
                            <p><?php echo substr($article['post_content'], 0, 600); ?>...</p>
                        </div>
                        <div class="card-action">
                            <span>Date de publication : <?php echo $article['post_date']; ?></span>
                            <span class="right"><a href="?module=post&action=post&id=<?php echo $article['post_ID'] ?>">Lire la suite</a></span>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="row">
            <div class="col s12">
                <ul class="pagination center-align">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active teal"><a href="?page=1">1</a></li>
                    <li class="waves-effect"><a href="?page=2">2</a></li>
                    <li class="waves-effect"><a href="?page=3">3</a></li>
                    <li class="waves-effect"><a href="?page=4">4</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>