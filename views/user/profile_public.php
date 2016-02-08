<?php include_once('views/layout/header.inc.php'); ?>
<div class="container">
    <div class="page-content">
        <div class="row margtop100">
            <div class="col l3 m12 s12 nopadding">
                <div class="card">
                    <div class="card panel colbgpublic noborder center">
                        <div class="panel-text">
                            <img class="resposive-img circle" src="assets/img/square_face.png">

                            <h2 class="name-profile white-text nospace">
                                <?php if ($data['infos']['FirstName'] !== null) {
                                    echo $data['infos']['FirstName'];
                                } else {
                                    echo "volunteer";
                                } ?>
                            </h2>

                            <p class="white-text">
                                <?php if ($data['infos']['Description'] !== null) {
                                    echo $data['infos']['Description'];
                                } else {
                                    echo "No description yet.";
                                } ?>
                            </p>

                            <p class="white-text">Rating :</p>
                            <span class="stars">
                                 <i class="material-icons noleft orange-icon">grade</i>
                                 <i class="material-icons noleft orange-icon">grade</i>
                                 <i class="material-icons noleft orange-icon">grade</i>
                                 <i class="material-icons noleft">grade</i>
                                 <i class="material-icons noleft">grade</i>
                                 <i class="material-icons noleft">grade</i>
                            </span>

                            <form action="profile/rate" method="post">
                                <p class="range-field">
                                    <input name="rate" type="range" id="test5" min="1" max="6"/>
                                </p>
                                <input type="hidden" name="idVolunteer" value="<?= $data['infos']['idUser']; ?>">
                                <button type="submit"
                                        class="dropdown-button btn btn-orange fullwidth space2">
                                    Rate Salim
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card panel">
                    <div class="panel-header">
                        Information

                        <?php
                        $dateRegister = date("F j, Y", strtotime($data['infos']['DateRegister']));
                        ?>
                    </div>
                    <div class="panel-text">
                        <ul class="nospace">
                            <li><i class="tiny material-icons orange-icon">email</i><?= $data['infos']['Email']; ?></li>
                            <li><i class="tiny material-icons orange-icon">room</i>
                                <?php if ($data['infos']['Location'] !== null) {
                                    echo $data['infos']['Location'];
                                } else {
                                    echo "unspecified";
                                } ?>
                            </li>
                            <li><i class="tiny material-icons orange-icon">today</i>
                                <?php if ($data['infos']['BirthDate'] !== null) {
                                    echo $data['infos']['BirthDate'];
                                } else {
                                    echo "unspecified";
                                } ?>
                            </li>
                        </ul>
                        <hr class="fancy-hr">
                        <ul class="nospace">
                            <li><strong>Work :</strong>
                                <?php if ($data['infos']['Work'] !== null) {
                                    echo $data['infos']['Work'];
                                } else {
                                    echo "unspecified";
                                } ?>
                            </li>
                            <li><strong>School : </strong>
                                <?php if ($data['infos']['School'] !== null) {
                                    echo $data['infos']['School'];
                                } else {
                                    echo "unspecified";
                                } ?>
                            </li>
                            <li><strong>Speaks : </strong> English, French</li>
                        </ul>
                    </div>
                </div>
                <!--<div class="card panel">
                    <div class="panel-header">
                        Events done
                    </div>
                    <div class="grey-text panel-text">
                        <div class="card-image space1">
                            <a href="#">
                                <img src="assets/img/event1.png" class="responsive-img">
                                <div class="card-title padding3">La Dynamiterie</div>
                            </a>
                        </div>
                        <div class="card-image space1">
                            <a href="#">
                                <img src="assets/img/event2.png" class="responsive-img">
                                <div class="card-title padding3">Still Standing</div>
                            </a>
                        </div>
                    </div>
                </div>-->
            </div><!-- fin col-->
            <div class="col l9 m12 s12">
                <div class="card panel panel-text nopadding">
                    <h1 class="title-profile-public nospace">
                        <?php if ($data['infos']['FirstName'] !== null) {
                            echo $data['infos']['FirstName'] . ", volunteer since " . $dateRegister;
                        } else {
                            echo "Volunteer since " . $dateRegister;
                        } ?>
                    </h1>
                    <ul class="tabs">
                        <li class="tab col s4"><a class="active" href="#test1">About Me</a></li>
                        <li class="tab col s4"><a href="#test2">Leave comment</a></li>
                    </ul>
                </div>
                <div class="card panel panel-text" id="test1">
                    <h4 class="nospace">Hello, I am Salim</h4>

                    <p>I love to surf, I'm a student from Slovenia living in Portugal :)</p>

                    <p>Life motto: "Follow your bliss!"</p>

                    <p>Why Volunteers?
                        It has all started 3 years ago, when I had a neck injury living in Lisbon and it was firstly
                        said, that I could spend my entire life on the wheelchair.
                        8 months of painful recovery has given me enough time to rethink life ambitions and goals.
                        When I got back "on my feet", I have realized, that there is a
                        profound wish to share happiness and "easy-going surf lifestyle" with others. </p>
                </div>
                <div class="card panel panel-text" id="test2">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="space1">Comments</h4>
                        </div>
                        <?php foreach ($data['reviews'] as $review): ?>
                            <div class="row">
                                <div class="col s12 l2 m12 center">
                                    <img src="assets/img/square_face.png" height="75" width="75" alt=""
                                         class="img-comment circle responsive-img"> <!-- notice the "circle" class -->
                                    <p class="center name-comment">
                                        <?php if ($review['FirstName'] !== null) {
                                            echo $review['FirstName'];
                                        } else {
                                            echo "Volunteer";
                                        } ?>
                                    </p>
                                </div>
                                <div class="col s12 l10 m12">
                                  <span class="grey-text">
                                      <?= $review['review']; ?>
                                      <!--<p class="date-comment">January 19 2015</p>-->
                                  </span>

                                    <div class="row">
                                        <div class="col s12">
                                            <hr class="fancy-hr2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="col s12 l2 m12 center padding4">
                            <img src="assets/img/square_face.png" height="75" width="75" alt=""
                                 class="img-comment circle responsive-img"><!-- notice the "circle" class -->

                            <p class="center name-comment">Johnny</p>
                        </div>
                        <div class="col s12 l10 m12">
                            <form method="post" action="profile/comment">
                                <div class="input-field">
                                    <input type="hidden" name="idvolunteer" value="<?= $data['infos']['idUser']; ?>">
                                    <textarea name="profile_comment" class="materialize-textarea"></textarea>
                                    <label>Post your comment</label>
                                </div>
                                <?php if (isset($_SESSION['user_id'])) { ?>
                                    <button type="submit" class="btn btn-blue">Post</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-blue" disabled>Post</button>
                                <?php } ?>
                            </form>
                            <!--<div class="row">
                                <div class="col s12">
                                    <hr class="fancy-hr">
                                </div>
                            </div>-->
                        </div>
                    </div><!-- fin row-->
                </div>
            </div><!-- fin col-->
        </div><!-- fin row-->
    </div>
</div>
<?php include_once('views/layout/footer.inc.php'); ?>
