<?php include_once('views/layout/header.inc.php'); ?>
    <div class="container content-event">
        <div class="row" id="secure_row">
            <img src="assets/img/events/uploads/<?= $data['event']['coverPicture']; ?>" class="event_couv"/>
        </div>
        <div class="row" id="secure_row">
            <div class="col s12 m8 event_maincontent">
                <h3 class="center event_title"><?= $data['event']['nameEvent']; ?></h3>

                <div class="collection event_apog">
                    <div class="collection-item1"><i
                            class="material-icons left">schedule</i><?= $data['event']['startEvent'] . '  -  ' . $data['event']['endEvent']; ?>
                    </div>
                    <a class="collection-item"><i class="material-icons left">location_on</i>
                        <?= $data['event']['locationEvent']; ?><span class="badge">View map</span>
                    </a>
                    <a class="collection-item"><i class="material-icons left">assignment_ind</i>
                        <?php foreach ($data['nbVolunteer'] as $nbVolunteer) { ?>
                            <?= $nbVolunteer['SUM(nbVolunteer)'] ?> volunteers needed
                        <?php } ?>
                    </a>
                </div>

                <div class="more_margin"></div>

                <div class="event_apog">
                    <h5 class="blued">Description</h5>

                    <div>
                        <input type="checkbox" class="read-more-state" id="post-1"/>

                        <!--<p class="read-more-wrap">Our annual SELL OUT New Years Eve party is back!
                            <br> London's ONLY Hard Dance and Hardcore event gives you 12 hours of raving to see in
                            2016 on a mad one !<span class="read-more-target"> Limited 4th release £20.00 tickets on sale now. Happy Hardcore / Old Skool / UK Hardcore Room SPECIAL GUEST TO BE ANNOUNCED</span>
                        </p>-->

                        <p class="read-more-wrap">
                            <?= $data['event']['descriptionEvent']; ?><!--<span class="read-more-target"></span>-->
                            <!--<label for="post-1" class="read-more-trigger"></label>-->
                        </p>
                    </div>
                </div>

                <div class="more_margin"></div>

                <div class="clear blued event_apog">
                    <h5>More info</h5>

                    <div class="secure_hover_picto">
                        <a href="#">
                            <div class="event_picto_soc event_fb"></div>
                        </a>
                        <a href="#">
                            <div class="event_picto_soc event_tw"></div>
                        </a>
                        <a href="#">
                            <div class="event_picto_soc"></div>
                        </a>
                    </div>
                </div>

                <div class="more_margin"></div>

                <div class="clear event_apog">
                    <h5 class="blued ">Medias</h5>
                    <?php foreach ($data['medias'] as $media) { ?>
                        <img class="event_media materialboxed"
                             src="assets/img/events/uploads/<?= $media['eventPicture']; ?>" alt=""/>
                    <?php } ?>
                </div>

                <div class="clear more_margin"></div>
                <div class="event_apog">
                    <h5 class="blued ">Query</h5>

                    <div class="faq col s12 media">
                        <p>Ask your question</p>

                        <form>
                            <input placeholder="example: How should i dress ?" id="first_name" type="text"
                                   class="validate col s9">
                            <label for="question" class="none col s3">Question</label>

                            <button name="submit" type="submit" class="btn btn-orange right bottom">Submit</button>
                        </form>
                    </div>

                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header grey_diff clear">How should i dress ?</div>
                            <div class="collapsible-body">
                                <div class="clear">
                                    <div class="chip margin event_secure_chip">
                                        <img src="assets/img/square_face.png" alt="Contact Person"> Nicolas
                                    </div>
                                    <form>
                                        <input placeholder="example: How should i dress ?" id="first_name"
                                               type="text" class="validate event_secure_input">
                                        <button name="submit" type="submit"
                                                class="btn btn-blue right bottom margin event_secure_btn2">Answer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header grey_diff clear">What is a locker ?</div>
                            <div class="collapsible-body">
                                <div class="clear">
                                    <div class="chip margin event_secure_chip">
                                        <img src="assets/img/square_face.png" alt="Contact Person"> Nicolas
                                    </div>
                                    <form>
                                        <input placeholder="example: How should i dress ?" id="first_name"
                                               type="text" class="validate event_secure_input">

                                        <button name="submit" type="submit"
                                                class="btn btn-blue right bottom margin event_secure_btn2">Answer
                                        </button>
                                    </form>
                                </div>
                                <div class="clear event_back_coment">
                                    <div class="chip event_secure_chip margin">
                                        <img src="assets/img/square_face.png" alt="Contact Person"> Jane Doe
                                    </div>
                                    <p class="event_secure_coment">Lorem ipsum dolor sit amet. An officia
                                        arbitrantur o ad aliqua commodo incurreret ab noster incididunt. Commodo hic
                                        sunt, legam e laboris ea se summis noster quid quibusdam et nisi in probant
                                    </p>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col s12 m4 event_col_droite">
                <p class="event_sstitre center">THEY VOLUNTEER !</p>

                <div class="event_volunteers">
                    <div class="clear event_vol_faces">
                        <?php foreach ($data['volunteers'] as $volunteer) { ?>
                            <a>
                                <img class="event_picto_face event_faces_responsive" src="assets/img/square_face.png"
                                     alt=""/>
                            </a>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                if ($_SESSION['user_id'] == $volunteer['idUser']) {
                                    $_SESSION['user_join_event'] = true;
                                }
                            }
                            ?>
                        <?php } ?>
                    </div>
                    <div class="clear">
                        <form action="user/join" method="post">
                            <input type="hidden" name="idEvent" value="<?= $data['event']['idEvent']; ?>">
                            <?php if (isset($_SESSION['user_email'])) { ?>
                                <?php if (isset($_SESSION['user_join_event']) && $_SESSION['user_join_event'] == true) { ?>
                                    <button name="submit" type="submit" class="btn btn-orange event_secure_bouton"
                                            disabled>
                                        You have already join the team
                                    </button>
                                <?php } else { ?>
                                    <button name="submit" type="submit" class="btn btn-orange event_secure_bouton">
                                        Join them now
                                    </button>
                                <?php } ?>
                            <?php } else { ?>
                                <button name="submit" type="submit" class="btn btn-orange event_secure_bouton" disabled>
                                    Log in for join them
                                </button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <div>
                    <p class="event_sstitre center">WE NEED VOLUNTEERS</p>
                    <ul class="collection event_color_border">
                        <?php foreach ($data['missions'] as $mission) { ?>
                            <div class="event_nb_need">
                                <p class="event_secure_nb"><?= $mission['nbVolunteer']; ?></p>
                            </div>
                            <li class="collection-item event_mis_need"><?= $mission['missionName']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php include_once('views/layout/footer.inc.php'); ?>