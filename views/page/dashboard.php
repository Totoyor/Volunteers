<?php include_once('views/layout/header.inc.php'); ?>
    <div class="container-full">

        <div class="nav-profil">
            <div class="nav-wrapper-profil">
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">My missions</a></li>
                    <li><a href="#">My events</a></li>
                    <li><a href="#">Edit my profile</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="col l3 m12 s12">
                    <div class="card">
                        <div class="card-image">
                            <img class="responsive-img" src="img/profilepic.png">
                        </div>

                        <div class="upload-profile-pic btn btn-block">
                            <i class="material-icons left">perm_identity</i>Upload a profile picture
                            <input type="file" class="upload"/>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card panel center">
                            <div class="panel-text">
                                <h2 class="name-profile nospace">Salim</h2>
                                <a href="profilepublic.php">See profile as public</a><br/>
                                <a href="editprofile.php">Edit profile</a>
                            </div>
                        </div>
                    </div>

                    <div class="card panel">
                        <div class="panel-header">
                            Quick links
                        </div>

                        <div class="grey-text panel-text">
                            <ul class="nospace">
                                <li><a href="#">Upcoming events</a></li>
                                <li><a href="#">Become a volunteer</a></li>
                                <li><a href="#">Organize your event</a></li>
                                <li><a href="#">Help</a></li>

                            </ul>

                        </div>

                    </div><!-- fin card panel-->

                </div>

                <div class="col l9 m12 s12">
                    <div class="card panel">
                        <div class="panel-header">
                            Welcome to Volunteers, Salim
                        </div>

                        <div class="grey-text panel-text">
                            <p class="nospace">Here is your dashboard, follow the links below to complete your profile,
                                to find an event or to create one. You can also invite your friends and enjoy some
                                benefits !</p>

                            <ul class="nostyle-list">
                                <li class="space2"><strong><a href="editprofile.php">Complete your profile</a></strong>

                                    <p class="nospace">Complete your profile by being as clear as possible so the
                                        organizers can really know who they are hiring and why they are intersted in
                                        you.</p>
                                </li>

                                <li class="space2"><strong><a href="#">Find events you like</a></strong>

                                    <p class="nospace">Téléchargez une photo et présentez-vous rapidement pour aider les
                                        organisateurs à vous connaître avant qu'ils ne vous contactent.</p>
                                </li>

                                <li class="space2"><strong><a href="creation_event.php">Create your event</a></strong>

                                    <p class="nospace">Téléchargez une photo et présentez-vous rapidement pour aider les
                                        organisateurs à vous connaître avant qu'ils ne vous contactent.</p>
                                </li>


                            </ul>
                        </div>

                    </div><!-- fin card panel-->

                    <div class="card panel">
                        <div class="panel-header">
                            My missions
                        </div>

                        <div class="grey-text panel-text">
                            <div class="row">
                                <div class="col l7 m7 s12">
                                    <p class="nospace">You have no mission right now but try to find an event to become
                                        a Volunteer !</p>
                                </div>

                                <div class="col l5 m5 s12">
                                    <a href="" class="btn btn-blue fullwidth">Find an event</a>
                                </div>
                            </div>

                        </div>

                    </div><!-- fin card panel-->

                    <div class="card panel">
                        <div class="panel-header">
                            My events
                        </div>

                        <div class="grey-text panel-text">
                            <div class="row">
                                <div class="col l7 m7 s12">
                                    <p class="nospace">You have no events right now. Create your event to work with the
                                        best volunteers.</p>
                                </div>

                                <div class="col l5 m5 s12">
                                    <a href="creation_event.php" class="btn btn-orange fullwidth">Create an event</a>
                                </div>
                            </div>


                        </div>

                    </div><!-- fin card panel-->

                    <div class="card panel">
                        <div class="panel-header">
                            Invite friends
                        </div>

                        <div class="grey-text panel-text">
                            <div class="row">
                                <div class="col l7 m7 s12">
                                    <p class="nospace">Invite your friends and earn benefits on the Volunteers
                                        website.</p>
                                </div>

                                <div class="col l5 m5 s12">
                                    <a href="" class="btn btn-block fullwidth">Invite friends</a>
                                </div>
                            </div>

                        </div>

                    </div><!-- fin card panel-->

                </div><!-- fin col-->
            </div><!-- fin row-->
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>