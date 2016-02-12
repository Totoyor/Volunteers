<?php include_once('views/layout/header.inc.php'); ?>
    <div class="container">
        <div class="page-content">
            <div class="row margtop100">
                <div class="col l3 m12 s12 colbg nopadding">
                    <?php include_once('views/layout/nav.profile.php'); ?>
                </div>
                <div class="col l9 m12 s12">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s4"><a class="active" href="#test1">Upcoming events</a></li>
                                <li class="tab col s4"><a href="#test2">Comments</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="test1">
                        <?php if(!empty($data['missions'])) { ?>
                            <?php foreach($data['missions'] as $mission): ?>
                                <div class="card panel panel2 space1">
                                    <div class="upcoming-event">
                                        <div class="content-upcoming-event">
                                            <h5 class="blue-title"><?= $mission['nameEvent']; ?></h5>
                                            <h6><?= $mission['locationEvent']; ?></h6>
                                            <p><i class="material-icons">schedule</i><?= $mission['startEvent']; ?></p>
                                        </div>
                                        <div class="show-missions">
                                            <a href="event/show/<?= $mission['idEvent']; ?>">
                                                <p>
                                                    View event
                                                    <i class="hide-on-med-and-down material-icons view-missions right">visibility</i>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            No upcoming event(s).
                        <?php } ?>
                    </div><!-- fin onglet1-->
                    <div id="test2" class="reviews card panel panel2 space1 bordernone padding1">
                    <?php if(!empty($data['reviews'])) { ?>
                        <?php foreach($data['reviews'] as $comment): ?>
                        <div class="row">
                            <div class="col l12 center">
                                <h4 class="title-profile">Comments from volunteers and organizers</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l2 m12 center">
                                <img src="assets/img/square_face.png" height="75" width="75" alt="" class="img-comment circle responsive-img"> <!-- notice the "circle" class -->
                                <p class="center name-comment"><?= $comment['FirstName']; ?></p>
                            </div>
                            <div class="col s12 l10 m12">
                                  <span class="black-text">
                                   <?= $comment['review']; ?>
                                    <p class="date-comment">January 19 2015</p>
                                  </span>
                                <div class="row">
                                    <div class="col s12">
                                        <hr class="fancy-hr2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        No comments yet.
                    <?php } ?>
                    </div><!-- fin onglet1-->
                </div><!-- fin col-->
            </div><!-- fin row-->
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>