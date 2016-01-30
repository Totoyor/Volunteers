<?php include_once('layout/adminheader.inc.php'); ?>

  <section id="sign-in">

    <!-- Background Bubbles -->
    <canvas id="bubble-canvas"></canvas>
    <!-- /Background Bubbles -->

    <!-- Sign In Form -->
    <form action="dashboard.html">
      <div class="row links">
        <div class="col s6 logo">
          <img src="assets/_con/images/logo-white.png" alt="">
        </div>
        <div class="col s6 right-align"><strong>Sign In</strong> / <a href="page-sign-up.html">Sign Up</a>
        </div>
      </div>

      <div class="card-panel clearfix">

        <!-- Social Sign Up -->
        <div class="row socials">
          <div class="col s4">
            <a class="btn blue darken-2 z-depth-0 z-depth-1-hover" href="#"><i class="fa fa-2x fa-facebook"></i></a>
          </div>
          <div class="col s4">
            <a class="btn blue lighten-2 z-depth-0 z-depth-1-hover" href="#"><i class="fa fa-2x fa-twitter"></i></a>
          </div>
          <div class="col s4">
            <a class="btn red z-depth-0 z-depth-1-hover" href="#"><i class="fa fa-2x fa-google-plus"></i></a>
          </div>
        </div>
        <!-- /Social Sign Up -->

        <div class="row">
          <div class="col"></div>
        </div>

        <!-- Username -->
        <div class="input-field">
          <i class="fa fa-user prefix"></i>
          <input id="username-input" type="text" class="validate">
          <label for="username-input">Username</label>
        </div>
        <!-- /Username -->

        <!-- Password -->
        <div class="input-field">
          <i class="fa fa-unlock-alt prefix"></i>
          <input id="password-input" type="password" class="validate">
          <label for="password-input">Password</label>
        </div>
        <!-- /Password -->

        <div class="switch">
          <label>
            <input type="checkbox" checked />
            <span class="lever"></span>
            Remember
          </label>
        </div>

        <button class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover">Sign In</button>
      </div>

      <div class="links right-align">
        <a href="page-forgot-password.html">Forgot Password?</a>
      </div>

    </form>
    <!-- /Sign In Form -->

  </section>


<?php include_once('layout/adminfooter.inc.php'); ?>