<?php include_once('views/layout/header.inc.php'); ?>
    <div class="big-img">
        <div class="row">
            <div class="col s6 blocprincipal white-text bgblue valign-wrapper">
                <div class="content-bloc center">
                    <h1 class="titre_left">I want to volunteer at events</h1>
                    <ul class="hidden-content-leftside">
                        <li><i class="material-icons">input</i>Join events for free</li>
                        <li><i class="material-icons">thumb_up</i>Live new work exepriences</li>
                        <li><i class="material-icons">person_pin</i>Meet awesome people</li>
                    </ul>
                    <a href="event/lists" class="btn btn_left">Join events now</a>
                </div>
            </div>
            <div class="col s6 blocprincipal white-text bgorange valign-wrapper">
                <div class="content-bloc center">
                    <h1 class="titre_right">I need volunteers for my event</h1>
                    <ul class="hidden-content-rightside">
                        <li><i class="material-icons">done</i>Easiest way to hire volunteers</li>
                        <li><i class="material-icons">schedule</i>Save time</li>
                        <li><i class="material-icons">visibility</i>Better visibility for your event</li>
                    </ul>
                    <a href="event/home" class="btn btn-orange btn_right">Tell us about your event</a>
                </div>
                <!-- content bloc-->
            </div>
            <!-- bloc principal-->
        </div>
        <!-- row-->
    </div>
    <!-- big img-->

    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="col s12 center">
                    <h2 class="title-section"><strong>Popular events</strong></h2>
                    <hr class="fancy-hr">
                </div>
            </div>

            <div class="row">
            <?php if (isset($data)): ?>
                <?php foreach ($data['eventsPremium'] as $premium) : ?>
                <div class="col s12 m6 l6">
                <a href="event/show/<?= $premium['idEvent']; ?>">
                    <div class="card small event popevent left">
                        <div class="card-image">
                            <?php if(!empty($premium['coverPicture'])) { ?>
                                <img class="responsive-img"
                                     src="assets/img/events/uploads/<?= $premium['coverPicture']; ?>"
                                     alt="image-event">
                            <?php } else { ?>
                                <img class="responsive-img"
                                     src="assets/img/couv_default.jpg"
                                     alt="image-event">
                            <?php } ?>
                        </div>
                        <div class="card-content">
                            <a href="event/show/<?= $premium['idEvent']; ?>">
                                <h4 class="titre-cards truncate black-text"><?= $premium['nameEvent']; ?></h4>
                            </a>
                            <h6 class="truncate black-text"><?= $premium['locationEvent']; ?></h6>
                        </div>
                        <div class="card-action">
                          <a href="event/sort/<?= $premium['idCategorie']; ?>/<?= strtolower($premium['nameCategorie']); ?>"><?= $premium['nameCategorie']; ?></a>
                          <a class="viewmore btn btn-blue" href="event/show/<?= $premium['idEvent']; ?>">See more</a>
                        </div>
                    </div>
                </a>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
            <!-- fin row (premium events) -->

        <div class="row">
        <?php if (isset($data)): ?>
        <div class="cat-row">
            <?php foreach ($data['events'] as $event) : ?>
            <div class="col s12 m6 l4">
                <div class="card small event popevent left">
                    <div class="card-image">
                        <a href="event/show/<?= $event['idEvent']; ?>">
                        <?php if(!empty($event['coverPicture'])) { ?>
                            <img class="responsive-img"
                                 src="assets/img/events/uploads/<?= $event['coverPicture']; ?>"
                                 alt="image-event">
                        <?php } else { ?>
                            <img class="responsive-img"
                                 src="assets/img/couv_default.jpg"
                                 alt="image-event">
                        <?php } ?>
                        </a>
                    </div>
                    <div class="card-content">
                        <a href="event/show/<?= $event['idEvent']; ?>"><h4 class="titre-cards truncate"><?= $event['nameEvent']; ?></h4></a>
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
        </div>
        <?php endif; ?>
        </div><!-- fin row (events) -->

            <div class="row">
                <div class="col s12 center">
                    <a href="event/lists" class="btn btn-blue">more exciting events</a>
                </div>
            </div>

            <div class="row">
                <div class="col s12 center">
                    <h2 class="title-section"><strong>Browse by categories</strong></h2>
                    <hr class="fancy-hr">
                </div>
            </div>

            <div class="row">
            <?php if (isset($data)): ?>
                <?php foreach ($data['categories'] as $category) : ?>
                    <?php if($category['nameCategorie'] == 'Festival') { ?>
                        <div class="row">
                        <div class="col s12 m8">
                            <a href="event/sort/<?= $category['idCategorie']; ?>">
                                <div class="card margin-cat-bottom festival_responsive">
                                    <div class="card-image item">
                                        <img class="responsive-img" alt="festival" src="assets/img/categories/uploads/<?= $category['imageCategorie']; ?>">
                                        <div class="text-wrapper">
                                            <h6 class="white-text"><?= $category['nameCategorie']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } elseif($category['nameCategorie'] == 'Rock') { ?>
                        <div class="col s12 m4">
                            <a href="event/sort/<?= $category['idCategorie']; ?>">
                                <div class="card margin-cat-bottom">
                                    <div class="card-image item">
                                        <img class="responsive-img" alt="party" src="assets/img/categories/uploads/<?= $category['imageCategorie']; ?>">
                                        <div class="text-wrapper">
                                            <h6 class="white-text"><?= $category['nameCategorie']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        </div>
                    <?php } else { ?>
                            <div class="col s12 m4">
                                <a href="event/sort/<?= $category['idCategorie']; ?>">
                                    <div class="card margin-cat-bottom">
                                        <div class="card-image item">
                                            <img class="responsive-img" alt="party" src="assets/img/categories/uploads/<?= $category['imageCategorie']; ?>">
                                            <div class="text-wrapper">
                                                <h6 class="white-text"><?= $category['nameCategorie']; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php } ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </div><!-- fin row-->
        </div><!-- fin page content-->
    </div><!-- fin container-->

<div class="row double-content white-text left bgleft">
    <div class="col s12 center">
        <h1 class="title-section white-text">Be helpful and party now</h1>
        <p class="white-text">Create your own event and join hundreds of thousands of event
            organizers</br>managing volunteers registrations</p>
        <a href="event/lists" class="btn btn-menu-bis btn-hoverbleu">Sign me up!</a>
    </div>
</div>

<div class="row double-content white-text left bgright">
    <div class="col s12 center">
        <h1 class="title-section white-text">ready to find volunteers ?</h1>
        <p class="white-text">Create your own event and join hundreds of thousands of event
            organizers</br>managing volunteers registrations </p>
        <a href="event/home" class="btn btn-menu-bis btn-hoveror">Create an event</a>
    </div>
</div>

<?php include_once('views/layout/footer.inc.php'); ?>