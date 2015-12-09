<?php include_once('views/layout/header.inc.php'); ?>

    <div class="container content-blog">
        <!-- Page Content goes here -->

        <?php foreach($data as $article) { ?>

            <div class="row">
                <div class="col s12 m12">
                    <div class="card grey lighten-4">
                        <div class="card-content black-text">
                        <span class="card-title">
                            <?php $this->helperLinkRewrite(array(
                                'class' => '',
                                'module' => 'blog',
                                'action' => 'post',
                                'id' => $article['post_ID'],
                                'text' => $article['post_title']
                            )) ?>
                        </span>
                            <p><?php echo substr($article['post_content'], 0, 600); ?>...</p>
                        </div>
                        <div class="card-action">
                            <span>Date de publication : <?php echo $article['post_date']; ?></span>
                            <span class="right"><?php $this->helperLinkRewrite(array(
                                    'class' => 'black-text',
                                    'module' => 'blog',
                                    'action' => 'post',
                                    'id' => $article['post_ID'],
                                    'text' => 'Lire la suite'
                                )) ?></span>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="row">
            <div class="col s12">
                <ul class="pagination center-align">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <?php for($i=1; $i<=$nbrPage; $i++) { ?>
                        <li class="waves-effect"><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>