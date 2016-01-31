<?php include_once('views/layout/header.inc.php'); ?>
    <div class="container">
        <div class="page-content">
            <div class="row margtop100">
                <div class="col l3 m12 s12 colbg nopadding">
                    <div class="card noborder">
                        <div class="card panel colbg noborder center">
                            <div class="panel-text">
                                <img class="resposive-img circle" src="assets/img/square_face.png" width="100"
                                     height="100">

                                <h2 class="name-profile nospace">Salim</h2>
                                <a href="profilepublic.php">See profile as public</a><br/>
                            </div>
                        </div>
                    </div>
                    <?php include_once('views/layout/nav.profile.php'); ?>
                </div>
                <div class="col l9 m12 s12">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s6"><a class="active" href="#saved">Saved events</a></li>
                                <li class="tab col s6"><a href="#published">Published events</a></li>
                            </ul>
                        </div>
                    </div><!-- fin row-->
                    <div id="saved">
                        <?php foreach($data['eventSaved'] as $saved): ?>
                        <div class="card panel panel2 space1">
                            <div class="upcoming-event">
                                <div class="eventsprofile">
                                    <div class="row valign-wrapper margin-cat-bottom">
                                        <div class="hide-on-small-only col l3 m3 s3">
                                            <?php if(!empty($saved['coverPicture'])) { ?>
                                                <a href="#"><img src="assets/img/events/uploads/<?= $saved['coverPicture']; ?>" class="responsive-img"></a>
                                            <?php } else { ?>
                                                <a href="#"><img src="assets/img/couv_default.jpg" class="responsive-img"></a>
                                            <?php } ?>
                                        </div>
                                        <div class="col l6 s6">
                                            <a href="#"><h5 class="blue-title"><?= $saved['nameEvent']; ?></h5></a>
                                            <h6>
                                                <?php if(!empty($saved['locationEvent'])) { ?>
                                                    <?= $saved['locationEvent']; ?>
                                                <?php } else { ?>
                                                    to define
                                                <?php } ?>
                                            </h6>
                                            <p>
                                                <i class="material-icons">schedule</i>
                                                <?php if(!empty($saved['startEvent'])) { ?>
                                                    <?= $saved['startEvent']; ?>
                                                <?php } else { ?>
                                                    to define
                                                <?php } ?>
                                            </p>
                                        </div>

                                        <div class="col l3 m3 s6">
                                            <a href="event/editshow/<?= $saved['idEvent']; ?>" class="space3 btn btn-orange fullwidth"><i
                                                    class="material-icons">create</i>Edit</a>
                                            <a href="#" class="btn btn-red fullwidth space3"><i class="material-icons">delete</i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div><!-- fin onglet1-->
                    <div id="published">
                        <?php foreach($data['eventsPulished'] as $published): ?>
                        <div class="card panel panel2 space1">
                            <div class="upcoming-event">
                                <div class="eventsprofile">
                                    <div class="row valign-wrapper margin-cat-bottom">
                                        <div class="hide-on-small-only col l3 m3 s3">
                                            <?php if(!empty($published['coverPicture'])) { ?>
                                                <a href="#"><img src="assets/img/events/uploads/<?= $published['coverPicture'] ?>" class="responsive-img"></a>
                                            <?php } else { ?>
                                                <a href="#"><img src="assets/img/couv_default.jpg" class="responsive-img"></a>
                                            <?php } ?>
                                        </div>
                                        <div class="col l6 s6">
                                            <a href="#"><h5 class="blue-title"><?= $published['nameEvent']; ?></h5></a>
                                            <h6><?= $published['locationEvent']; ?></h6>
                                            <p><i class="material-icons">schedule</i><?= $published['startEvent']; ?></p>
                                        </div>

                                        <div class="col l3 m3 s6">
                                            <a href="event/editshow/<?= $published['idEvent']; ?>" class="space3 btn btn-orange fullwidth"><i
                                                    class="material-icons">create</i>Edit</a>
                                            <a href="#" class="btn btn-red fullwidth space3"><i class="material-icons">delete</i>Delete</a>
                                            <a href="event/listvolunteers/<?= $published['idEvent']; ?>" class="btn btn-block fullwidth"><i
                                                    class="material-icons">people</i>Volunteers</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div><!-- fin onglet2-->
                </div><!-- fin col-->
            </div><!-- fin row-->
        </div>
    </div>
<?php include_once('views/layout/footer.inc.php'); ?>