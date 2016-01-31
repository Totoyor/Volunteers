<?php include_once('views/layout/adminheader.inc.php'); ?>
<section class="content-wrap">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Register user</h1>
      </div>

    </div>
    <!-- /Breadcrumb -->
<div class="row">
  <div class="col s12 l6">

    <div class="card-panel">
      <form action="?module=user&action=signup" method="post">

        <div class="row">

        <!-- Email -->
        <div class="input-field">
          <i class="fa fa-envelope prefix"></i>
          <input id="input_email" type="email" name="email" id="email">
          <label for="input_email">Email</label>
        </div>
        <!-- /Email -->

        <!-- Password -->
        <div class="input-field">
          <i class="fa fa-unlock-alt prefix"></i>
          <input id="input_password" type="password" name="password" id="password">
          <label for="input_password">Password</label>
        </div>
        <!-- /Password -->

        <button class="waves-effect btn" type="sumbit" name="action">Register</button>

      </form>
    </div>

  </div>
</section>
<?php include_once('views/layout/adminfooter.inc.php'); ?>