  <!DOCTYPE html>
<!--[if lt IE 7]>  <html class="lt-ie7"> <![endif]-->
<!--[if IE 7]>     <html class="lt-ie8"> <![endif]-->
<!--[if IE 8]>     <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Volunteers - Admin</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>


  <link rel="icon" type="image/png" href="../assets/admin/_con/images/icon.png">

  <!-- nanoScroller -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/nanoScroller/nanoscroller.css" />

  <!-- FontAwesome -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/font-awesome/css/font-awesome.min.css" />

  <!-- Material Design Icons -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/material-design-icons/css/material-design-icons.min.css" />

  <!-- Main -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/_con/css/_con.min.css" />

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/style.css" />

  </script>
</head>
<body>

  <section id="sign-up">

    <!-- Background Bubbles -->
    <canvas id="bubble-canvas"></canvas>
    <!-- /Background Bubbles -->

    <!-- Sign Up Form -->
    <form action="?module=admin&action=signup" method="post">
      <div class="row links">
        <div class="col s6 logo">
          <img src="assets/_con/images/logo-white.png" alt="">
        </div>
        <div class="col s6 right-align"><a href="signin">Sign In</a> / <strong>Sign Up</strong>
        </div>
      </div>

      <div class="card-panel clearfix">

        <div class="row">
          <!-- First Name -->
          <div class="col m6 s12">
            <div class="input-field">
              <i class="fa fa-user prefix"></i>
              <input id="input_fname" type="text">
              <label for="input_fname">First Name</label>
            </div>
          </div>
          <!-- /First Name -->

          <!-- Last Name -->
          <div class="col m6 s12">
            <div class="input-field">
              <i class="fa fa-user prefix"></i>
              <input id="input_lname" type="text">
              <label for="input_lname">Last Name</label>
            </div>
          </div>
          <!-- /Last Name -->
        </div>

        <!-- Email -->
        <div class="input-field">
          <i class="fa fa-envelope prefix"></i>
          <input id="input_email" type="email">
          <label for="input_email">Email</label>
        </div>
        <!-- /Email -->

        <!-- Password -->
        <div class="input-field">
          <i class="fa fa-unlock-alt prefix"></i>
          <input id="input_password" type="password">
          <label for="input_password">Password</label>
        </div>
        <!-- /Password -->

        <p>
          <input type="checkbox" id="checkbox_terms" />
          <label for="checkbox_terms">I agree to the <a href="#">terms of use</a>.</label>
        </p>

        <button class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover">Sign Up</button>
      </div>

    </form>
    <!-- /Sign Up Form -->

  </section>


    <footer>&copy; 2015 <strong>Volunteers</strong>. All rights reserved.
  </footer>

  <!-- jQuery -->
  <script type="text/javascript" src="../assets/admin/jquery/jquery.min.js"></script>

  <!-- nanoScroller -->
  <script type="text/javascript" src="../assets/admin/nanoScroller/jquery.nanoscroller.min.js"></script>

  <!-- Materialize -->
  <script type="text/javascript" src="../assets/admin/materialize/js/materialize.min.js"></script>

  <!-- Main -->
  <script type="text/javascript" src="../assets/admin/_con/js/_con.min.js"></script>

  <!-- Custom script -->
  <script type="text/javascript" src="../assets/admin/script.js"></script>
  </script>
</body>

</html>
<!-- Localized -->