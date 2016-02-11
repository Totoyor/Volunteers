  <footer>&copy; 2015 <strong>Volunteers</strong>. All rights reserved.
  </footer>

  <!-- jQuery -->
  <script type="text/javascript" src="<?php echo PATH_HOME ?>assets/admin/jquery/jquery.min.js"></script>

  <!-- nanoScroller -->
  <script type="text/javascript" src="<?php echo PATH_HOME ?>assets/admin/nanoScroller/jquery.nanoscroller.min.js"></script>

  <!-- Materialize -->
  <script type="text/javascript" src="<?php echo PATH_HOME ?>assets/admin/materialize/js/materialize.min.js"></script>

  <!-- Main -->
  <script type="text/javascript" src="<?php echo PATH_HOME ?>assets/admin/_con/js/_con.min.js"></script>

  <!-- Custom script -->
  <script type="text/javascript" src="<?php echo PATH_HOME ?>assets/admin/script.js"></script>

  <script type="text/javascript" src="<?php echo PATH_HOME ?>assets/js/monjs.js"></script>

  <script type="text/javascript" src="<?php echo PATH_HOME ?>assets/js/dropify.js"></script>
  <script type='text/javascript' src='<?php echo PATH_HOME ?>assets/js/notie.js'></script>
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
<!-- Localized -->