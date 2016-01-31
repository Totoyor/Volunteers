<?php include_once('views/layout/header.inc.php'); ?>
<div class="container">
    <div class="page-content">
        <div class="row margtop100">
            <div class="col l3 m12 s12 nopadding">
                <div class="card">
                    <div class="card panel colbgpublic noborder center">
                        <div class="panel-text">
                            <img class="resposive-img circle" src="assets/assets/img/face.jpg">

                            <h2 class="name-profile white-text nospace">Salim</h2>

                            <p class="white-text">Hi, I'm Salim, I love to volunteers at events especially concerts or
                                festival of rock and pop music. Feel free to contact me or to hire me for any type of
                                missions since I enjoy doing evrything !</p>


                            <p class="white-text">Rating :</p>
                                <span class="stars">
                         <i class="material-icons noleft orange-icon">grade</i>
                         <i class="material-icons noleft orange-icon">grade</i>
                         <i class="material-icons noleft orange-icon">grade</i>
                         <i class="material-icons noleft">grade</i>
                         <i class="material-icons noleft">grade</i>
                        </span>

                            <form action="#">
                                <p class="range-field">
                                    <input type="range" id="test5" min="1" max="5"/>
                                </p>
                            </form>

                            <a href="#" class="dropdown-button btn btn-orange fullwidth space2" data-activates='rate'>Rate
                                Salim</a>

                        </div>
                    </div>
                </div>

                <div class="card panel">

                    <div class="panel-header">
                        Information
                    </div>

                    <div class="panel-text">
                        <ul class="nospace">
                            <li><i class="tiny material-icons orange-icon">email</i>salim1ziadi@gmail.com</li>
                            <li><i class="tiny material-icons orange-icon">room</i>Paris, France</li>
                            <li><i class="tiny material-icons orange-icon">today</i>29 july 1991</li>
                        </ul>

                        <hr class="fancy-hr">
                        <ul class="nospace">
                            <li><strong>Work :</strong> Nothing for now</li>
                            <li><strong>School : </strong> Bac + 3</li>
                            <li><strong>Speaks : </strong> English, French</li>


                        </ul>

                    </div>
                </div>

                <div class="card panel">

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
                </div>
            </div><!-- fin col-->

            <div class="col l9 m12 s12">
                <div class="card panel panel-text nopadding">
                    <h1 class="title-profile-public nospace">Salim ZIADI, volunteer since January 2016</h1>

                    <ul class="tabs">
                        <li class="tab col s4"><a class="active" href="#test1">About Salim</a></li>
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
                            <h4 class="space1">Comments from organizers</h4>
                        </div>
                        <div class="row">
                            <div class="col s12 l2 m12 center">
                                <img src="/assets/assets/img/square_face.png" height="75" width="75" alt=""
                                     class="img-comment circle responsive-img"> <!-- notice the "circle" class -->

                                <p class="center name-comment">Johnny</p>
                            </div>
                            <div class="col s12 l10 m12">
                                  <span class="grey-text">
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

                        <div class="col s12 l2 m12 center padding4">
                            <img src="assets/assets/img/square_face.png" height="75" width="75" alt=""
                                 class="img-comment circle responsive-img"><!-- notice the "circle" class -->

                            <p class="center name-comment">Johnny</p>
                        </div>
                        <div class="col s12 l10 m12">
                            <form method="post">
                                <div class="input-field">
                                    <textarea class="materialize-textarea"></textarea>
                                    <label>Post your comment</label>

                                </div>
                                <button type="submit" class="btn btn-blue">Post</button>

                            </form>
                            <div class="row">
                                <div class="col s12">
                                    <hr class="fancy-hr">
                                </div>
                            </div>

                        </div>

                    </div><!-- fin row-->


                </div>
            </div><!-- fin col-->
        </div><!-- fin row-->
    </div>
</div>
<?php include_once('views/layout/footer.inc.php'); ?>
