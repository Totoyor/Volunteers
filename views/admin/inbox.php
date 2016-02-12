<?php include_once('views/layout/adminheader.inc.php'); ?>
<!-- Main Content -->
  <section class="content-wrap mail-inbox">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Inbox <small class='grey-text'>(2 new)</small></h1>

          <ul>
            <li>
              <a href="#"><i class="fa fa-home"></i> Home</a>
            </li>
            <li><a href='#!'>Mail</a><i class='fa fa-angle-right'></i>
            </li>
            <li><a href='mail-inbox.html'>Inbox</a>
            </li>
          </ul>
        </div>
        <div class="col s12 m3 l2 right-align">
          <a href="#!" class="btn grey lighten-3 grey-text z-depth-0 chat-toggle"><i class="fa fa-comments"></i></a>
        </div>
      </div>

    </div>
    <!-- /Breadcrumb -->

    <div class="card-panel">
      <form action="#!">
        <div class="input-field mail-search">
          <i class="mdi-action-search prefix"></i>
          <input id="mail_search" type="text" name="mail_search">
          <label for="mail_search">Search</label>
          <!--a class="btn">Search</a-->
        </div>
      </form>
    </div>

    <div class="row">
      <!--<div class="col s12 m3 l2">
        <div class="card-panel">

          <ul class="mail-sidebar">
            <li class="active">
              <a href="mail-inbox.html"><i class="mdi-content-inbox"></i> Inbox</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-device-access-time"></i> Snoozed</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-action-done"></i> Done</a>
            </li>


            <li>
              <hr>
            </li>

            <li>
              <a href="mail-inbox.html"><i class="mdi-content-send"></i> Sent</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-action-delete"></i> Trash</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-content-report"></i> Spam</a>
            </li>


            <li>
              <hr>
            </li>

            <li>
              <a href="mail-inbox.html"><i class="mdi-device-airplanemode-on"></i> Travel</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-action-shopping-cart"></i> Purchases</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-social-group"></i> Social</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-file-cloud-download"></i> Updates</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-communication-forum"></i> Forums</a>
            </li>
          </ul>

        </div>
      </div>
      <!-- /Mail Sidebar -->

      <div class="col s12 m9 l12">
        <div class="card-panel">
          <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>Nom / Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
                </thead>
              <tbody>
              <?php foreach($data as $mail) { ?>
                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox1" />
                    <label for="checkbox1"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html"><?= $mail['name'] ?> / <?= $mail['email'] ?></a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html"><?= $mail['message'] ?></a>
                  </td>
                  <td class="mail-date">3:12 PM</td>
                    <td class="mail-date">
                        <a onclick="return confirm('Are you sure you want to delete this message ?');" href="deletemail/<?= $mail['id']; ?>" class="btn red">
                            <i class="mdi-content-clear"></i> delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!--<div class="center-align">
            <a href="#!" class="btn-flat waves-effect grey-text text-darken-1">Load More</a>
          </div>-->
        </div>
      </div>
    </div>

  </section>
  <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>