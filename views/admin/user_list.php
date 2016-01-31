<?php include_once('views/layout/adminheader.inc.php'); ?>
<!-- Main Content -->
  <section class="content-wrap ecommerce-customers">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>User List</h1>
        </div>
      </div>

    </div>
    <!-- /Breadcrumb -->

    <div class="row">
      <?php if (isset($data)): ?>
          <?php foreach ($data['users'] as $user) : ?>
            <div class="col s6 m3 l2">
              <div class="card image-card">
                <div class="image">
                  <?php if(!empty($user['Picture'])) { ?>
                    <img src="assets/img/users/uploads/<?= $user['Picture']; ?>" alt="<?= $user['FirstName']; ?>">
                  <?php } else { ?>
                    <img src="assets/img/users/uploads/defaultuser.jpg" alt="User">
                  <?php } ?>
                  <a href="singleuser/<?= $user['idUser']; ?>" class="link"></a>
                </div>

                <div class="content">
                  <?php if ($user['FirstName'] != null){ ?>
                    <h5><?= $user['FirstName']; ?> <?= $user['LastName']; ?></h5>
                    <?php } else { ?>
                    <h5>Volunteer n°<?= $user['idUser']; ?></h5>
                    <?php } ?>
                </div>
                <div class="actions" style="padding: 5px;">
                  <a href="edituser/<?= $user['idUser']; ?>" class="btn btn-small z-depth-0"><i class="mdi mdi-editor-mode-edit"></i></a>
                  <a href="singleuser/<?= $user['idUser']; ?>" class="btn btn-small z-depth-0"><i class="mdi mdi-action-visibility"></i></a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

  </section>
  <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>