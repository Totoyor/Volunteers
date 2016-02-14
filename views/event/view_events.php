<?php include_once('views/layout/header.inc.php'); ?>

<div class="page-content grey lighten-4">
   
    <div class="row margtop100">
         
        <div class=" col s12 m12 l12">
        <h1 class="center title-section"><strong>Discover events to volunteer !</strong></h1>
         <hr class="fancy-hr">
         
   
        </div>
        
    </div>
    <div class="row">
        
        <div class="col s12 m12 l6 nopadding">
            <div class="row">
                <form method="get" name="search-event" id="search-event">
                    <div class="">
                        <input type="text" name="input-search" placeholder="Search for events.." id="input-search" class="secure_height_input"/>
                    </div>
                    <!--<div class="col s2">
                        <button type="submit" class="btn btn-vue-bis">Search</button>
                    </div>-->
                </form>
            </div>
          
        </div>
            <form method="post" action="event/sort">
                <div class="col s12 m4 l2 ">
                            <select name="category" class="browser-default border secure_height_input">
                                <option disabled selected>Choose a category</option>
                                <?php foreach ($data['categories'] as $category): ?>
                                    <option value="<?= $category['idCategorie']; ?>">
                                        <?= $category['nameCategorie']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                 <div class="col s12 m4 l2 border secure_height_input">
                            <input type="text" placeholder="Pick a date" name="sortDate" class="datepicker input-date secure_date">
                </div>
                
                <div class="col s12 m4 l2">
                    <button id="btn-sort" class="btn btn-bleu col l8 center-align secure_height_input">SORT</button>
                </div>
            </form>
          <hr class="fancy-hr">
        </div>
    <div class="row">
        
        <div class="">
            <div class="div_results row">
                <?php if (isset($data)): ?>
                    <?php foreach ($data['events'] as $event) : ?>
                        <div id="divList" class="col s12 m6 l4">
                            <div class="card small event popevent left">
                                <div class="card-image">
                                    <a href="event/show/<?= $event['idEvent']; ?>">
                                    <?php if(!empty($event['coverPicture'])) { ?>
                                        <a href="event/show/<?= $event['idEvent']; ?>"><img class="responsive-img"
                                         src="assets/img/events/uploads/<?= $event['coverPicture']; ?>"
                                         alt="<?= $event['nameEvent']; ?>"></a>
                                    <?php } else { ?>
                                        <a href="event/show/<?= $event['idEvent']; ?>"><img class="responsive-img"
                                             src="assets/img/couv_default.jpg"
                                             alt="<?= $event['nameEvent']; ?>"></a>
                                    <?php } ?>
                                    </a>
                                </div>
                                <div class="card-content">

                                    <a href="event/show/<?= $event['idEvent']; ?>"><h4 class="titre-cards truncate black-text"><?= $event['nameEvent']; ?></h4></a>

                                    <h6 class="truncate location-cards"><?= $event['locationEvent']; ?>
                                        , <?= $event['startEvent']; ?></h6>
                                </div>
                                <div class="card-action">
                                    <a class="card-categorie" href="event/sort/<?= $event['idCategorie']; ?>/<?= strtolower($event['nameCategorie']); ?>"><?= $event['nameCategorie']; ?></a>
                                    <a class="viewmore btn btn-blue" href="event/show/<?= $event['idEvent']; ?>">See
                                        more</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><!-- fin container-->

</div>

<?php if (!empty($data)): ?>
    <div class="bloc_search col s12 m6 l4">
        <div class="card small event popevent left">
            <div class="card-image">
                <a class="lien-titre" href="event/show/<?= $event['idEvent']; ?>">
                <img class="responsive-img" src="assets/img/events/uploads/<?= $event['coverPicture']; ?>"
                     alt="image-event">
                </a>
            </div>
            <div class="card-content">
                <a class="lien-titre" href="event/show/<?= $event['idEvent']; ?>"><h4 class="titre-cards truncate"><?= $event['nameEvent']; ?></h4></a>
                <h6 class="truncate location-cards"><?= $event['locationEvent']; ?>, <?= $event['startEvent']; ?></h6>
            </div>
            <div class="card-action">
                <a class="card-categorie" href="event/sort/<?= $event['idCategorie']; ?>/<?= strtolower($event['nameCategorie']); ?>"><?= $event['nameCategorie']; ?></a>
                <a class="viewmore btn btn-blue" href="event/show/<?= $event['idEvent']; ?>">See more</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php include_once('views/layout/footer.inc.php'); ?>
    
