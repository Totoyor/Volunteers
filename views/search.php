<?php include_once('views/layout/header.inc.php'); ?>

    <div class="container content-blog">
        <h4>Résultats de votre recherche :</h4>
        <?php
        if(isset($data[0]))
        {
            foreach ($data as $article)
            { ?>

                <div class="row">
                    <div class="col s12 m12">
                        <div class="card grey lighten-4 hoverable">
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

            <?php
            }
        }
        else { ?>
            <p>Aucun article ne correspond à votre recherche.</p>
        <?php }
        ?>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>