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


  <link rel="icon" type="image/png" href="<?php echo PATH_HOME ?>assets/admin/_con/images/icon.png">

  <!-- nanoScroller -->
  <link rel="stylesheet" type="text/css" href="<?php echo PATH_HOME ?>assets/admin/nanoScroller/nanoscroller.css" />

  <!-- FontAwesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo PATH_HOME ?>assets/admin/font-awesome/css/font-awesome.min.css" />

  <!-- Material Design Icons -->
  <link rel="stylesheet" type="text/css" href="<?php echo PATH_HOME ?>assets/admin/material-design-icons/css/material-design-icons.min.css" />

  <!-- Main -->
  <link rel="stylesheet" type="text/css" href="<?php echo PATH_HOME ?>assets/admin/_con/css/_con.min.css" />

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="<?php echo PATH_HOME ?>assets/admin/style.css" />

  <!-- Dropify -->
  <link rel="stylesheet" type="text/css" href="<?php echo PATH_HOME ?>assets/css/dropify.css">

  </script>
</head>
<body>
  <nav class="navbar-top navbar-dark navbar-under navbar-static">
    <div class="nav-wrapper">

      <!-- Sidebar toggle -->
      <a href="#" class="yay-toggle">
        <div class="burg1"></div>
        <div class="burg2"></div>
        <div class="burg3"></div>
      </a>
      <!-- Sidebar toggle -->

      <!-- Logo -->
      <a href="#!" class="brand-logo">
        <img src="<?php echo PATH_HOME ?>assets/img/logo_volonteers3.svg" alt="Con">
      </a>
      <!-- /Logo -->

      <!-- Menu -->
      <ul>
        <li><a href="#!" class="search-bar-toggle"><i class="mdi-action-search"></i></a>
        </li>
        <li class="user">
          <a class="dropdown-button" href="#!" data-activates="user-dropdown">
            <img src="<?php echo PATH_HOME ?>assets/img/square_face.png" alt="John Doe" class="circle">Admin<i class="mdi-navigation-expand-more right"></i>
          </a>

          <ul id="user-dropdown" class="dropdown-content">
            <!--<li><a href="page-profile.html"><i class="fa fa-user"></i> Profile</a>
            </li>-->
            <li class="divider"></li>
            <li><a href="logout"><i class="fa fa-sign-out"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- /Menu -->

    </div>
  </nav>
  <!-- /Top Navbar -->


  <!--
  Yay Sidebar
  Options [you can use all of theme classnames]:
    .yay-hide-to-small         - no hide menu, just set it small with big icons
    .yay-static                - stop using fixed sidebar (will scroll with content)
    .yay-gestures              - to show and hide menu using gesture swipes
    .yay-light                 - light color scheme
    .yay-hide-on-content-click - hide menu on content click

  Effects [you can use one of these classnames]:
    .yay-overlay  - overlay content
    .yay-push     - push content to right
    .yay-shrink   - shrink content width
-->
  <aside class="yaybar yay-shrink yay-hide-to-small yay-gestures">

    <div class="top">
      <div>
        <!-- Sidebar toggle -->
        <a href="#" class="yay-toggle">
          <div class="burg1"></div>
          <div class="burg2"></div>
          <div class="burg3"></div>
        </a>
        <!-- Sidebar toggle -->

        <!-- Logo -->
        <a href="#!" class="brand-logo">
          <img src="<?php echo PATH_HOME ?>assets/img/logo_volonteers3.svg" alt="Con">
        </a>
        <!-- /Logo -->
      </div>
    </div>


    <div class="nano">
      <div class="nano-content">

        <ul>
          <li class="label">Menu</li>
            <!-- <li class="active"> -->
            <li class="">
              <a href="<?= PATH_HOME ?>admin/dashboard" class="waves-effect waves-blue"><i class="mdi-action-assessment"></i> Dashboard</a>
            </li>
            <li>
              <a class="yay-sub-toggle waves-effect waves-blue"><i class="mdi-action-assignment-ind"></i> Users<span class="yay-collapse-icon mdi-navigation-expand-more"></span></a>
              <ul>
                <li><a href="<?php echo PATH_HOME ?>admin/registeruser" class="waves-effect waves-blue"><i class="mdi-content-add-circle"></i> Register</a>
                </li>
                <li><a href="<?php echo PATH_HOME ?>admin/userlist" class="waves-effect waves-blue"><i class="mdi-av-equalizer"></i> List</a>
                </li>
                <li><a href="<?php echo PATH_HOME ?>admin/userstatus" class="waves-effect waves-blue"><i class="mdi-action-dashboard"></i> Status</a>
                </li>
                <li><a href="<?php echo PATH_HOME ?>admin/usersreview" class="waves-effect waves-blue"><i class="mdi-action-dashboard"></i> Reviews / Rates</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="yay-sub-toggle waves-effect waves-blue"><i class="mdi-av-queue-music"></i> Events<span class="yay-collapse-icon mdi-navigation-expand-more"></span></a>
              <ul>
                <li><a href="<?php echo PATH_HOME ?>admin/createevent" class="waves-effect waves-blue"><i class="mdi-content-add-circle"></i> Create</a>
                </li>
                <li><a href="<?php echo PATH_HOME ?>admin/eventlist" class="waves-effect waves-blue"><i class="mdi-av-equalizer"></i> List</a>
                </li>
                <li><a href="<?php echo PATH_HOME ?>admin/categories" class="waves-effect waves-blue" href="<?php echo PATH_HOME ?>admin/css-badges.html"><i class="mdi-action-dashboard"></i> Categories</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="yay-sub-toggle waves-effect waves-blue"><i class="mdi-action-markunread-mailbox"></i> Mailbox<span class="yay-collapse-icon mdi-navigation-expand-more"></span></a>
              <ul>
                <li><a href="<?php echo PATH_HOME ?>admin/inbox" class="waves-effect waves-blue"><i class="mdi-content-inbox"></i>Inbox</a>
                </li>
                <li><a href="<?php echo PATH_HOME ?>admin/compose" class="waves-effect waves-blue"><i class="mdi-content-add-circle"></i> Compose</a>
                </li>
              </ul>
            </li>

          </li>
        </ul>

      </div>
    </div>
  </aside>
  <!-- /Yay Sidebar -->