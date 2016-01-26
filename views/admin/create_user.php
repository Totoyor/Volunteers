<?php include_once('layout/adminheader.inc.php'); ?>
<!-- Main Content -->
  <section class="content-wrap">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Register</h1>

          <ul>
            <li>
              <a href="#"><i class="fa fa-home"></i> Home</a>  <i class="fa fa-angle-right"></i>
            </li>

            <li><a href='dashboard.html'>Dashboard</a>  <i class='fa fa-angle-right'></i>
            </li>
            <li><a href='#'>Forms</a>  <i class='fa fa-angle-right'></i>
            </li>
            <li><a href='forms-register.html'>Register</a>
            </li>
          </ul>
        </div>
        <div class="col s12 m3 l2 right-align">
          <a href="#!" class="btn grey lighten-3 grey-text z-depth-0 chat-toggle"><i class="fa fa-comments"></i></a>
        </div>
      </div>

    </div>
    <!-- /Breadcrumb -->


    <div class="row">
      <div class="col s12 l6">

        <div class="card-panel">
          <form action="#!">

            <div class="row">
              <!-- First Name -->
              <div class="col m6 s12">
                <div class="input-field">
                  <i class="fa fa-user prefix"></i>
                  <input id="input_fname" type="text" name="firstname">
                  <label for="input_fname">First Name</label>
                </div>
              </div>
              <!-- /First Name -->

              <!-- Last Name -->
              <div class="col m6 s12">
                <div class="input-field">
                  <i class="fa fa-user prefix"></i>
                  <input id="input_lname" type="text" name="lastname">
                  <label for="input_lname">Last Name</label>
                </div>
              </div>
              <!-- /Last Name -->
            </div>

            <!-- Email -->
            <div class="input-field">
              <i class="fa fa-envelope prefix"></i>
              <input id="input_email" type="email" name="email">
              <label for="input_email">Email</label>
            </div>
            <!-- /Email -->

            <!-- Password -->
            <div class="input-field">
              <i class="fa fa-unlock-alt prefix"></i>
              <input id="input_password" type="password" name="password">
              <label for="input_password">Password</label>
            </div>
            <!-- /Password -->

            <!-- Gender -->
            <select name="gender">
              <option value="" disabled selected>Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
            <!-- /Gender -->

            <button class="waves-effect btn">Register</button>

          </form>
        </div>

      </div>

    </div>

  </section>
  <!-- /Main Content -->
<?php include_once('layout/adminfooter.inc.php'); ?>