<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <?php echo BASE_HOME ?>
    <title><?php echo TITLE_HEAD; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <!--Website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import CSS -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"/>
</head>
<body>
<nav class="blue-grey darken-4" role="navigation">
    <div class="nav-wrapper container">
        <div class="col s2">
            <a id="logo-container" href="?" class="brand-logo white-text">
                Blog
            </a>
        </div>
        <ul class="right hide-on-med-and-down">
            <form action="?module=search&action=find" method="post">
                <div class="input-field">
                    <input id="search" type="search" placeholder="Rechercher" name="find" required>
                    <label for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li>
<!--                <a href="?module=user" class="color-link white-text"><i class="material-icons">person_pin</i></a>-->
                <a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons">person_pin</i></a>
            </li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
            <li><a href="?module=page&action=home">Home</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <?php
    if(!isset($_SESSION['user_email'])) { ?>
        <li><a href="?module=user">Sign In</a></li>
        <li class="divider"></li>
        <li><a href="?module=user&action=signin">Sign Up</a></li>
    <?php }
     else { ?>
        <li><a href="?module=user">Profile </a></li>
        <li class="divider"></li>
        <li><a href="?module=user&action=disconnect">Sign Out </a></li>
    <?php } ?>
</ul>