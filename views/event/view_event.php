<?php include_once('views/layout/header.inc.php'); ?>
    <div class="container content-event">
        <div class="row" id="secure_row">
            <?php if(!empty($data['event']['coverPicture'])) { ?>
                <img src="assets/img/events/uploads/<?= $data['event']['coverPicture']; ?>" class="event_couv"/>
            <?php } else { ?>
                <img src="assets/img/couv_par.jpg" class="event_couv"/>
            <?php } ?>
        </div>
        <div class="row" id="secure_row">
            <div class="col s12 m8 event_maincontent">
                <h1 class="center event_title left event_apog"><?= $data['event']['nameEvent']; ?></h1>
                <ul class="collapsible clear event_apog dshadow radius" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">query_builder</i>
                            <?= $data['event']['startEvent'] . '<em> ' . $data['event']['hourStartEvent'] . '</em>  -  ' . $data['event']['endEvent'] . '<em> ' . $data['event']['hourEndEvent'] . '</em>'; ?>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">place</i>
                            <?= $data['event']['locationEvent']; ?>
                            <span class="reply right">View map</span>
                        </div>
                        <div class="collapsible-body" onload="//initMap()">
                            <div>
                                <!--<iframe class="map"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24190.47771857847!2d-73.97530616228735!3d40.72220524493002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25942c97aa1ed%3A0xf3f544c180838fa2!2sOutput!5e0!3m2!1sfr!2sfr!4v1453205040900"
                                        width="96%" height="300" frameborder="0" style="border:0"
                                        allowfullscreen></iframe>-->
                                <div id="map" style="width: 96%; height: 300px;">

                                </div>

                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">person_pin</i>
                            <?php foreach ($data['nbVolunteer'] as $nbVolunteer) { ?>
                                <?= $nbVolunteer['SUM(nbVolunteer)'] ?> volunteers needed
                            <?php } ?>
                        </div>
                    </li>
                </ul>

                <div class="event_apog encar">
                    <h5 class="event_sstitre">Description</h5>

                    <div>
                        <input type="checkbox" class="read-more-state" id="post-1"/>

                        <p class="read-more-wrap">
                            <!--Our annual SELL OUT New Years Eve party is back!
                            <br> London's ONLY Hard Dance and Hardcore event gives you 12 hours of raving to see in 2016
                            on a mad one !<span class="read-more-target"> Limited 4th release £20.00 tickets on sale now. Happy Hardcore / Old Skool / UK Hardcore Room SPECIAL GUEST TO BE ANNOUNCED</span>-->
                            <?= $data['event']['descriptionEvent']; ?>
                        </p>
                        <!--<label for="post-1" class="read-more-trigger reply"></label>-->
                    </div>
                </div>

                <div class="clear event_apog encar">
                    <h5 class="event_sstitre">Photos</h5>

                    <div class="leftmargin">
                        <?php foreach ($data['medias'] as $media) { ?>
                            <img class="event_media materialboxed"
                                 src="assets/img/events/uploads/<?= $media['eventPicture']; ?>" alt=""/>
                        <?php } ?>
                    </div>

                </div>


                <div class="event_apog ">
                    <div class="faq col s12 media dshadow">
                        <div class="more_margin"></div>
                        <h5 class="event_sstitre">Q & A</h5>

                        <p>Ask a question</p>

                        <form method="post" action="event/question">
                            <i class="material-icons prefix">chat_bubble</i>
                            <input name="question" placeholder="example: How should i dress ?" type="text"
                                   class="validate question_input" required>

                            <input type="hidden" name="idEvent" value="<?= $data['event']['idEvent']; ?>">

                            <label for="question" class="none">Question</label>
                            <?php if (isset($_SESSION['user_email'])) { ?>
                                <button name="submit" type="submit" class="btn btn-orange right bottom" required>
                                    Submit
                                </button>
                            <?php } else { ?>
                                <button name="submit" type="submit" class="btn btn-orange right bottom" disabled>
                                    Submit
                                </button>
                            <?php } ?>
                        </form>
                    </div>
                    <ul class="collapsible dshadow accordion_border radius" data-collapsible="accordion">
                        <?php if (!empty($data['questions'])): ?>
                            <?php foreach ($data['questions'] as $question): ?>
                                <li>
                                    <!-- QUESTION -->
                                    <div class="collapsible-header blue lighten-3 clear upborder">
                                        <div class="chip event_secure_chip absolute">
                                            <img src="assets/img/square_face.png" alt="Contact Person">
                                            <?php if (isset($question['FirstName']) && $question['FirstName'] !== null) {
                                                echo $question['FirstName'];
                                            } else {
                                                echo 'Volunteer';
                                            } ?>
                                        </div>
                                        <div>
                                            <p class="nomargin"><?= $question['eventQuestion']; ?>
                                                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['event']['idUser']): ?>
                                                    <span class="right reply">Answer</span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- FIN QUESTION -->
                                    <!-- FORMULAIRE DE REPONSE -->
                                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['event']['idUser']): ?>
                                        <div class="collapsible-body accordion_border">
                                            <div class="chip margin event_secure_chip">
                                                <img src="assets/img/square_face.png" alt="Contact Person"> Organizer
                                            </div>
                                            <form method="post" action="event/answer">
                                                <input name="answer" placeholder="example: How should i dress ?"
                                                       id="first_name" type="text"
                                                       class="validate event_secure_input" required>

                                                <input type="hidden" name="idQuestion"
                                                       value="<?= $question['idEventQuestions']; ?>">
                                                <input type="hidden" name="idCreator"
                                                       value="<?= $data['event']['idUser']; ?>">
                                                <input type="hidden" name="idEvent" value="<?= $_GET['id']; ?>">

                                                <?php if (isset($_SESSION['user_email'])) { ?>
                                                    <button name="submit" type="submit"
                                                            class="btn btn-blue right bottom margin event_secure_btn2">
                                                        <i class="material-icons">reply</i>
                                                    </button>
                                                <?php } else { ?>
                                                    <button name="submit" type="submit"
                                                            class="btn btn-blue right bottom margin event_secure_btn2"
                                                            disabled><i
                                                            class="material-icons">reply</i></button>
                                                <?php } ?>
                                            </form>
                                            <p></p>
                                        </div>
                                    <?php endif; ?>
                                    <!-- FIN FORMULAIRE DE REPONSE -->
                                    <!-- AFFICHAGE DE LA REPONSE  -->
                                    <?php if (isset($question['idEventAnswers']) && $question['idEventAnswers'] !== null): ?>
                                        <div class="reponse">
                                            <div class="chip margin event_secure_chip2">
                                                <i class="material-icons prefix">comment</i>
                                                <img src="assets/img/square_face.png" alt="Contact Person">Organizer
                                            </div>
                                            <p class="secure_reponse"><?= $question['eventAnswer']; ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <!-- FIN AFFICHAGE DE LA REPONSE  -->
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col s12 m4 event_col_droite">

                <div class="more_margin"></div>
                <div class="more_margin"></div>
                <div class="more_margin"></div>
                <div class="more_margin"></div>

                <p class="event_sstitre">They are volunteering!</p>

                <div class="event_volunteers encar">
                    <div class="clear event_vol_faces">
                        <?php foreach ($data['volunteers'] as $volunteer) { ?>
                            <a>
                                <img class="event_picto_face event_faces_responsive" src="assets/img/square_face.png"
                                     alt=""/>
                            </a>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                if ($_SESSION['user_id'] == $volunteer['idUser']) {
                                    $userJoinEvent = true;
                                }
                            }
                            ?>
                        <?php } ?>
                    </div>
                    <div class="clear">
                        <form action="user/join" method="post">
                            <input type="hidden" name="idEvent" value="<?= $data['event']['idEvent']; ?>">
                            <?php if (isset($_SESSION['user_email'])) { ?>
                                <?php if (isset($userJoinEvent) && $userJoinEvent == true) { ?>
                                    <button name="submit" type="submit" class="btn btn-orange event_secure_bouton"
                                            disabled>
                                        You have already volunteered
                                    </button>
                                <?php } else { ?>
                                    <button name="submit" type="submit" class="btn btn-orange event_secure_bouton">
                                        Join them now
                                    </button>
                                <?php } ?>
                            <?php } else { ?>
                                <button name="submit" type="submit" class="btn btn-orange event_secure_bouton" disabled>
                                    Log in to join them
                                </button>
                            <?php } ?>
                        </form>
                    </div>
                </div>

                <div>
                    <p class="event_sstitre">We need volunteers</p>
                    <ul class="collection event_color_border">
                        <?php foreach ($data['missions'] as $mission) { ?>
                            <div class="event_nb_need">
                                <p class="event_secure_nb"><?= $mission['nbVolunteer']; ?></p>
                            </div>
                            <li class="collection-item event_mis_need"><?= $mission['missionName']; ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <h5 class="event_sstitre">More info</h5>

                <div class="clear blued encar">
                    <div class="secure_hover_picto">
                        <a href="#">
                            <div class="event_picto_soc event_fb"></div>
                        </a>
                        <a href="#">
                            <div class="event_picto_soc event_ins"></div>
                        </a>
                        <a href="#">
                            <div class="event_picto_soc event_yout"></div>
                        </a>
                        <a href="#">
                            <div class="event_picto_soc event_tw"></div>
                        </a>
                        <a href="#">
                            <div class="event_picto_soc"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once('views/layout/footer.inc.php'); ?>
