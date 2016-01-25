<?php include_once('views/layout/header.inc.php'); ?>

<div class="page-content grey lighten-4">
    <div class="row margtop100">
        <div class="col s12 m9 l9 right">
            <div class="row">
                <form method="get" name="search-event" id="search-event">
                    <div class="col s12">
                        <input type="text" name="input-search" placeholder="Search for events.." id="input-search"/>
                    </div>
                    <!--<div class="col s2">
                        <button type="submit" class="btn btn-vue-bis">Search</button>
                    </div>-->
                </form>
            </div>
            <hr class="fancy-hr">
        </div>
    </div>
    <div class="row">
        <div class="col s0 m3 l3">
            <div class="filter hide-on-small-only">
                <!--<form method="get" action="/search" id="search">
                    <input type="text" placeholder="Location" id="location-search" class="no-border-input"/>
                </form>-->
                <div id="div-cat-chip" >
                    <div id="chip-bulle" class="chip">
                        <i id="cat-chip" class="material-icons categories">close</i>
                        Techno
                    </div>
                </div>
                <ul class="collapsible" data-collapsible="expandable">
                    <li>
                        <div class="collapsible-header active"><i class="material-icons">label</i>Category</div>
                        <div class="collapsible-body decal">
                            <ul id="genre-categories">
                                <?php foreach($data['categories'] as $category): ?>
                                    <li class="categories"><a><?= $category['nameCategorie']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header active"><i class="material-icons">schedule</i>Date</div>
                        <div class="collapsible-body decal">
                            <ul>
                                <li class="categories"><a>Next week</a></li>
                                <li class="categories"><a>Next month</a></li>
                                <li class="categories"><a>Next 2 months</a></li>
                                <li class="categories"><a>Next semester</a></li>
                                <li class="categories"><a>Custom Date</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <div class="col s12 m9 l9 right">
            <div class="div_results row">
                <?php if(isset($data)): ?>
                <?php foreach ($data['events'] as $event) : ?>
                    <div id="divList" class="col s12 m6 l4">
                        <div class="card small event popevent left">
                            <div class="card-image">
                                <img class="responsive-img" src="assets/img/events/uploads/<?= $event['coverPicture']; ?>" alt="image-event">
                            </div>
                            <div class="card-content">
                                <h4 class="titre-cards truncate"><?= $event['nameEvent']; ?></h4>
                                <h6 class="truncate location-cards"><?= $event['locationEvent']; ?>, <?= $event['startEvent']; ?></h6>
                            </div>
                            <div class="card-action">
                                <a class="card-categorie" href="#"><?= $event['nameCategorie']; ?></a>
                                <a class="viewmore btn btn-blue" href="event/show/<?= $event['idEvent']; ?>">See more</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><!-- fin container-->
<?php if(isset($data)): ?>
    <div class="bloc_search col s12 m6 l4">
        <div class="card small event popevent left">
            <div class="card-image">
                <img class="responsive-img" src="assets/img/events/uploads/<?= $event['coverPicture']; ?>" alt="image-event">
            </div>
            <div class="card-content">
                <h4 class="titre-cards truncate"><?= $event['nameEvent']; ?></h4>
                <h6 class="truncate location-cards"><?= $event['locationEvent']; ?>, <?= $event['startEvent']; ?></h6>
            </div>
            <div class="card-action">
                <a class="card-categorie" href="#"><?= $event['nameCategorie']; ?></a>
                <a class="viewmore btn btn-blue" href="event/show/<?= $event['idEvent']; ?>">See more</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php include_once('views/layout/footer.inc.php'); ?>

