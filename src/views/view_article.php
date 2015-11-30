<?php include_once('views/layout/header.inc.php'); ?>

<h1><?php echo $data['post_title']; ?></h1>


<?php var_dump($data); ?>

<div>
    <p>Date de publication : <?php echo $data['post_date']; ?></p>
    <p><?php echo $data['post_content']; ?></p>
</div>


<?php include_once('views/layout/footer.inc.php'); ?>