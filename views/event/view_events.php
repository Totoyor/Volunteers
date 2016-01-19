<?php include_once('views/layout/header.inc.php'); ?>

<div class="page-content grey lighten-4">
    <div class="row margtop100">
        <div class="col s12 m9 l9 right">
            <div class="row">
                <div class="col s10">
                    <form method="get" action="/search" id="search-event">
                        <input type="text" placeholder="Search for events.." id="event-search"/>
                    </form>
                </div>
                <div class="col s2">
                    <a class="btn btn-vue-bis" href="#">Search</a>
                </div>
            </div>
            <hr class="fancy-hr">
        </div>
    </div>


    <div class="row">
        <div class="col s0 m3 l3">
            <div class="filter hide-on-small-only">
                <form method="get" action="/search" id="search">
                    <input type="text" placeholder="Location" id="location-search" class="no-border-input"/>
                </form>
                <div class="chip">

                    <i class="material-icons">close</i>
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
            <div class="row">
                <?php foreach ($data['events'] as $event) : ?>
                    <div class="col s12 m6 l4">
                        <div class="card small event popevent left">
                            <div class="card-image">
                                <img class="responsive-img" src="assets/img/events/uploads/<?= $event['coverPicture']; ?>" alt="image-event">
                            </div>
                            <div class="card-content">
                                <h4 class="titre-cards truncate"><?= $event['nameEvent']; ?></h4>
                                <h6 class="truncate"><?= $event['locationEvent']; ?>, <?= $event['startEvent']; ?></h6>
                            </div>
                            <div class="card-action">
                                <a href="#"><?= $event['nameCategorie']; ?></a>
                                <a class="viewmore btn btn-blue" href="event/show/<?= $event['idEvent']; ?>">See more</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--<hr class="fancy-hr">-->
            </div>
        </div>
    </div>
</div><!-- fin container-->

<?php include_once('views/layout/footer.inc.php'); ?>

