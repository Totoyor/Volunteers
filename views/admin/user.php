<?php include_once('views/layout/adminheader.inc.php'); ?>
<!-- Main Content -->
  <section class="content-wrap">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Profile</h1>
        </div>
      </div>

    </div>
    <!-- /Breadcrumb -->

    <div class="card-panel">
      <table class="profile-info">
        <tbody>
          <tr>
            <td class="photo">
              <img src="assets/_con/images/user.jpg" alt="<?php echo $data['FirstName']; ?>">
            </td>
            <td>
              <!-- Edit Button -->
              <a href="<?php echo PATH_HOME ?>admin/edituser/<?= $data['idUser']; ?>" class="btn btn-small right z-depth-0"><i class="mdi mdi-editor-mode-edit"></i></a>
              <!-- /Edit Button -->
              <!-- Name -->
              <h3><?php echo $data['FirstName']; ?> <?php echo $data['LastName']; ?></h3>
              <!-- /Name -->

              <!-- Status Message -->
              <span>Born <?php echo $data['BirthDate']; ?> <br> Lives in <?php echo $data['Location']; ?></span>
              <!-- /Status Message -->


              <!-- Contact Buttons -->
              <!-- <div class="contacts">
                <a href="#!" class="blue darken-3 white-text waves-effect">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="#!" class="blue lighten-2 white-text waves-effect">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="#!" class="red white-text waves-effect">
                  <i class="fa fa-google-plus"></i>
                </a>
                <a href="#!" class="blue lighten-1 white-text waves-effect">
                  <i class="fa fa-skype"></i>
                </a>
                <a href="#!" class="pink lighten-2 white-text waves-effect">
                  <i class="fa fa-dribbble"></i>
                </a>
                <a href="#!" class="grey darken-3 white-text waves-effect">
                  <i class="fa fa-github"></i>
                </a>
              </div> -->
              <!-- /Contact Buttons -->
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="row">
      <div class="col s12 l9">

        <!-- About -->
        <div class="card">
          <div class="title">
            <h5><i class="fa fa-user"></i> About</h5>
            <a class="close" href="#">
              <i class="mdi-content-clear"></i>
            </a>
            <a class="minimize" href="#">
              <i class="mdi-navigation-expand-less"></i>
            </a>
          </div>
          <div class="content">
            <?php echo $data['Description']; ?>
          </div>
        </div>
        <!-- /About -->

      </div>

      <div class="col s12 l3">

        <!-- Statistics -->
        <div class="card profile-skills">
          <div class="title">
            <h5><i class="fa fa-bar-chart"></i> Statistics</h5>
            <a class="close" href="#">
              <i class="mdi-content-clear"></i>
            </a>
            <a class="minimize" href="#">
              <i class="mdi-navigation-expand-less"></i>
            </a>
          </div>
          <div class="content">
            <div class="row center-align" style="margin-top: 0">
              <div class="col m6 s12">
                <strong>87</strong>
                <h5>Events created</h5>
              </div>
              <div class="col m6 s12">
                <strong>12</strong>
                <h5>Volunteering</h5>
              </div>
            </div>
          </div>
        </div>
        <!-- /Statistics -->

        <p></p>

        <!-- Skills -->
        <div class="card profile-skills">
          <div class="title">
            <h5><i class="fa fa-trophy"></i> Skills</h5>
            <a class="close" href="#">
              <i class="mdi-content-clear"></i>
            </a>
            <a class="minimize" href="#">
              <i class="mdi-navigation-expand-less"></i>
            </a>
          </div>
          <div class="content">
            <?php echo $data['Skills']; ?>
          </div>
        </div>
        <!-- /Skills -->

        <p></p>

        <!-- Send Message -->
        <div class="card">
          <div class="title">
            <h5><i class="fa fa-user"></i> Send Message</h5>
            <a class="close" href="#">
              <i class="mdi-content-clear"></i>
            </a>
            <a class="minimize" href="#">
              <i class="mdi-navigation-expand-less"></i>
            </a>
          </div>
          <div class="content">
            <form action="#!">
              <div class="input-field">
                <textarea id="textarea1" class="materialize-textarea" name="message"></textarea>
                <label for="textarea1">Send me message</label>
              </div>
              <button class="btn">Send</button>
            </form>
          </div>
        </div>
        <!-- /Send Message -->

      </div>
    </div>

  </section>
  <!-- /Main Content -->
  <?php include_once('views/layout/adminfooter.inc.php'); ?>