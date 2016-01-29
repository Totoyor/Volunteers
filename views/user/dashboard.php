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
                                <li class="tab col s4"><a class="active" href="#test1">Upcoming events</a></li>
                                <li class="tab col s4"><a href="#test2">Comments</a></li>


                            </ul>

                        </div>
                    </div>

                    <div id="test1" class="card panel panel2 space1">
                        <div class="upcoming-event">
                            <div class="content-upcoming-event">

                                <h5 class="blue-title">La Dynamiterie</h5>
                                <h6>Studio Albatros, Montreuil</h6>

                                <p><i class="material-icons">schedule</i>21 Nov. 2015</p>

                            </div>


                            <div class="list-missions">
                                <hr class="fancy-hr">
                                <h5 class="blue-title">Missions</h5>
                                <ul>
                                    <li><i class="material-icons">done</i>Trash</li>
                                    <li><i class="material-icons">done</i>Bar</li>
                                    <li><i class="material-icons">done</i>Tickets</li>
                                </ul>
                            </div>


                            <div class="show-missions">

                                <p>
                                    View what I'll do during this event
                                    <i class="hide-on-med-and-down material-icons view-missions right">visibility</i>
                                </p>


                            </div>

                        </div>
                    </div><!-- fin onglet1-->


                    <div id="test2" class="reviews card panel panel2 space1 bordernone padding1">
                        <div class="row">
                            <div class="col l12 center">
                                <h4 class="title-profile">Comments from volunteers and organizers</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 l2 m12 center">
                                <img src="assets/img/square_face.png" height="75" width="75" alt=""
                                     class="img-comment circle responsive-img"> <!-- notice the "circle" class -->

                                <p class="center name-comment">Johnny</p>
                            </div>
                            <div class="col s12 l10 m12">
                                  <span class="black-text">
                                    Nam neque ante, consequat quis enim nec, dictum consequat turpis. Duis sem mi, ultricies ut purus vitae, varius semper nisi. In in arcu eu felis feugiat vulputate vitae sit amet sem. Nullam egestas felis nec lacus ullamcorper tempor sed ut lectus. Aenean congue risus ipsum, sit amet varius tortor malesuada eu.

                                    <p class="date-comment">January 19 2015</p>
                                  </span>

                                <div class="row">
                                    <div class="col s12">
                                        <hr class="fancy-hr2">
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="row">
                            <div class="col s12 l2 m12 center">
                                <img src="assets/img/square_face.png" height="75" width="75" alt=""
                                     class="img-comment circle responsive-img"><!-- notice the "circle" class -->

                                <p class="center name-comment">Johnny</p>
                            </div>
                            <div class="col s12 l10 m12">
                                  <span class="black-text">
                                    Nam neque ante, consequat quis enim nec, dictum consequat turpis. Duis sem mi, ultricies ut purus vitae, varius semper nisi. In in arcu eu felis feugiat vulputate vitae sit amet sem. Nullam egestas felis nec lacus ullamcorper tempor sed ut lectus. Aenean congue risus ipsum, sit amet varius tortor malesuada eu.

                                    <p class="date-comment">January 19 2015</p>
                                  </span>

                                <div class="row">
                                    <div class="col s12">
                                        <hr class="fancy-hr">
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div><!-- fin onglet1-->

                </div><!-- fin col-->
            </div><!-- fin row-->
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>