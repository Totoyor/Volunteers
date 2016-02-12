<?php if(defined('DEBUG') && DEBUG) { ?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card grey lighten-2">
                <div class="card-content white-text">
                    <div class="card-title black-text">Debug Tool</div>
                    <div class="modal-debug">
                        <!-- Modal Trigger $_POST -->
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">$_POST</a>
                        <!-- Modal Structure $_POST -->
                        <div id="modal1" class="modal">
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
                        <div id="modal2" class="modal">
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
                        <div id="modal3" class="modal">
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
                        <div id="modal4" class="modal">
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
                        <div id="modal5" class="modal">
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
                        <div id="modal6" class="modal">
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

<footer class="page-footer blue-grey darken-3">
    <div class="footer-copyright">
        <div class="container">
            Made by Thomas Vanwelden - 2015
        </div>
    </div>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/front.js"></script>
</body>
</html>