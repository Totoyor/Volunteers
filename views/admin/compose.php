<?php include_once('views/layout/adminheader.inc.php'); ?>
<!-- Main Content -->
  <section class="content-wrap mail-compose">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Compose Email</h1>

          <ul>
            <li>
              <a href="#"><i class="fa fa-home"></i> Home</a>  <i class="fa fa-angle-right"></i>
            </li>

            <li><a href='#!'>Mail</a><i class='fa fa-angle-right'></i>
            </li>
            <li><a href='mail-compose.html'>Compose</a>
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
      <div class="col s12 m4 l2">
        <div class="card-panel">

          <!-- Mail Sidebar -->
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
          <!-- /Mail Sidebar -->

        </div>
      </div>
      <div class="col s12 m8 l10">
        <div class="card-panel">
          <form action="#!">
            <!-- To -->
            <div class="input-field">
              <input id="input_to" type="email" class="validate" value="john.doe@inbox.my" name="to">
              <label for="input_to">To</label>
            </div>
            <!-- /To -->

            <!-- Subject -->
            <div class="input-field">
              <input id="input_subject" type="text" class="validate" name="subject">
              <label for="input_subject">Subject</label>
            </div>
            <!-- /Subject -->

            <!-- Message -->
            <textarea name="message" id="ckeditor-msg">
              <p>
                Donec lacinia dignissim elementum. <strong>Aenean sit</strong> amet justo ornare, pharetra nisl eu, ultricies justo. Praesent imperdiet vel augue in posuere. <a href="#!">Pellentesque</a> a consequat risus. Vestibulum cursus nisl aliquet leo
                viverra, ac placerat felis tempor. Sed in felis sed odio fermentum venenatis vitae ac nulla. Nam quis mollis leo. Etiam in lacus ligula.
              </p>

              <p>
                <a href="#!">Vestibulum</a> enim nunc, rhoncus vitae velit sed, <strong>tempus vulputate</strong> libero. Fusce at sapien elit. Donec maximus et lectus ac convallis. Mauris maximus pretium metus in tempus. Aliquam erat volutpat. Integer et
                ante eget sapien pulvinar vulputate. Nullam vel enim sed odio fringilla congue. Aliquam pellentesque feugiat purus sed laoreet.
              </p>
            </textarea>
            <!-- /Message -->

          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>