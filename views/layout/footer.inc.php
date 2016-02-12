<?php if(defined('DEBUG') && DEBUG) { ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card grey lighten-2">
                    <div class="card-content white-text center">
                        <div class="card-title black-text">Debug Tool</div>
                        <div class="modal-debug">
                            <!-- Modal Trigger $_POST -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">$_POST</a>
                            <!-- Modal Structure $_POST -->
                            <div id="modal1" class="modal modal_var">
                                <div class="modal-content">
                                    <h4 class="black-text">$_POST</h4>
                                    <span class="black-text"><?php var_dump($_POST); ?></span>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-debug">
                            <!-- Modal Trigger $_GET -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal2">$_GET</a>
                            <!-- Modal Structure $_GET -->
                            <div id="modal2" class="modal modal_var">
                                <div class="modal-content">
                                    <h4 class="black-text">$_GET</h4>
                                    <span class="black-text"><?php var_dump($_GET); ?></span>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-debug">
                            <!-- Modal Trigger $_SESSION -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal3">$_SESSION</a>
                            <!-- Modal Structure $_SESSION -->
                            <div id="modal3" class="modal modal_var">
                                <div class="modal-content">
                                    <h4 class="black-text">$_SESSION</h4>
                                    <span class="black-text"><?php var_dump($_SESSION); ?></span>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-debug">
                            <!-- Modal Trigger $_COOKIE -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal4">$_COOKIE</a>
                            <!-- Modal Structure $_COOKIE -->
                            <div id="modal4" class="modal modal_var">
                                <div class="modal-content">
                                    <h4 class="black-text">$_COOKIE</h4>
                                    <span class="black-text"><?php var_dump($_COOKIE); ?></span>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-debug">
                            <!-- Modal Trigger $_FILES -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal5">$_FILES</a>
                            <!-- Modal Structure $_FILES -->
                            <div id="modal5" class="modal modal_var">
                                <div class="modal-content">
                                    <h4 class="black-text">$_FILES</h4>
                                    <span class="black-text"><?php var_dump($_FILES); ?></span>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-debug">
                            <!-- Modal Trigger $_SERVER -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal6">$_SERVER</a>
                            <!-- Modal Structure $_SERVER -->
                            <div id="modal6" class="modal modal_var">
                                <div class="modal-content">
                                    <h4 class="black-text">$_SERVER</h4>
                                    <span class="black-text"><?php var_dump($_SERVER); ?></span>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<footer class="page-footer">
    <div class="container footer-wrapper">
        <div class="row">
            <div class="col s12 m3 footer-elements">
                <h5 class="title-list white-text">Company</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="page/aboutus">About us</a></li>
                    <li><a class="grey-text text-lighten-3" href="contact/home">Contact</a></li>
                    <li><a class="grey-text text-lighten-3" href="blog/home">Blog</a></li>
                    <li><a class="grey-text text-lighten-3" href="home/terms">Terms and privacy</a></li>
                </ul>
            </div>

            <div class="col s12 m3">
                <h5 class="title-list white-text">Menu</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="event/home">Find volunteers</a></li>
                    <li><a class="grey-text text-lighten-3" class="modal-trigger" href="#login">Log In</a></li>
                    <li><a class="grey-text text-lighten-3" class="modal-trigger" href="#signup">Sign Up</a></li>
                    <li><a class="grey-text text-lighten-3" href="?module=help">Help</a></li>
                </ul>
            </div>

            <div class="col s12 m3">
                <h5 class="title-list white-text">Follow us</h5>
                <ul class="social-list">
                    <li>
                        <a class="grey-text text-lighten-3"
                           href="https://www.facebook.com/Volunteers-EEMI-1618903831716708/?fref=ts">
                            <img class="icon-social" src="assets/img/fb.svg">
                        </a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="#!">
                            <img class="icon-social" src="assets/img/tw.svg">
                        </a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="#!">
                            <img class="icon-social" src="assets/img/ig.svg">
                        </a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="#!">
                            <img class="icon-social" src="assets/img/yt.svg">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col s12 m3">
                <ul>
                    <h5 class="title-list white-text">Subscribe to our newsletter</h5>
                    <div id="mc_embed_signup">
                        <form action="home/newsletter" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                            class="validate">
                            <div id="mc_embed_signup_scroll">
                                <input type="email" name="newsletter" class="email" id="mce-EMAIL"
                                       placeholder="Enter your e-mail" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_2fb275a6dc11af1ee664e7ea2_f47de3f760" tabindex="-1" value="">
                                </div>
                                <div class="clear"><input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="btn btn-menu-bis hoverdark">
                                </div>
                            </div>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container footer-wrapper footer-bas center">
            © 2015 Volunteers - All right reserved
        </div>
    </div>
</footer>

<!--Google Analytics-->
<script async>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-70620240-1', 'auto');
    ga('send', 'pageview');

    window.ga_debug = {trace: true};
</script>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/monjs.js"></script>
<script type="text/javascript" src="assets/js/ajax.search.js"></script>
<script type="text/javascript" src="assets/js/dropify.js"></script>
<script type='text/javascript' src='assets/js/notie.js'></script>
<?php
// Affichage de la notification
if(isset($_SESSION['FlashMessage'])) {
    $this->helperGetFlashMessage(array('type' => $_SESSION['FlashMessage']['type'],
                                        'message' => $_SESSION['FlashMessage']['message'],
                                        'duration' => $_SESSION['FlashMessage']['duration']));
    unset($_SESSION['FlashMessage']);
}
?>

</body>
</html>