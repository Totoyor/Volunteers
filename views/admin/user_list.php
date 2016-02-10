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

<!--    <div class="row">-->
<!--      --><?php //if (isset($data)): ?>
<!--          --><?php //foreach ($data['users'] as $user) : ?>
<!--            <div class="col s6 m3 l2">-->
<!--              <div class="card image-card">-->
<!--                <div class="image">-->
<!--                  --><?php //if(!empty($user['Picture'])) { ?>
<!--                    <img src="assets/img/users/uploads/--><?//= $user['Picture']; ?><!--" alt="--><?//= $user['FirstName']; ?><!--">-->
<!--                  --><?php //} else { ?>
<!--                    <img src="assets/img/users/uploads/defaultuser.jpg" alt="User">-->
<!--                  --><?php //} ?>
<!--                  <a href="singleuser/--><?//= $user['idUser']; ?><!--" class="link"></a>-->
<!--                </div>-->
<!---->
<!--                <div class="content">-->
<!--                  --><?php //if ($user['FirstName'] != null){ ?>
<!--                    <h5>--><?//= $user['FirstName']; ?><!-- --><?//= $user['LastName']; ?><!--</h5>-->
<!--                    --><?php //} else { ?>
<!--                    <h5>Volunteer n°--><?//= $user['idUser']; ?><!--</h5>-->
<!--                    --><?php //} ?>
<!--                </div>-->
<!--                <div class="actions" style="padding: 5px;">-->
<!--                  <a href="edituser/--><?//= $user['idUser']; ?><!--" class="btn btn-small z-depth-0"><i class="mdi mdi-editor-mode-edit"></i></a>-->
<!--                  <a href="singleuser/--><?//= $user['idUser']; ?><!--" class="btn btn-small z-depth-0"><i class="mdi mdi-action-visibility"></i></a>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            --><?php //endforeach; ?>
<!--        --><?php //endif; ?>
<!---->
<!--    </div>-->


      <table id="table1" class="display table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>Nom</th>
          <th>Status</th>
          <th>Active</th>
          <th>View</th>
          <th>Edit</th>
          <th>Disable</th>
          <th>Delete</th>
        </tr>
        </thead>
        <tbody>
          <?php if (isset($data)): ?>
            <?php foreach ($data['users'] as $user) : ?>
              <tr>
                <td class="center-align">
                  <?php if($user['FirstName'] !== null) {
                    echo $user['FirstName'];
                  } else {
                    echo " / ";
                  } ?>
                </td>
                <td class="center-align">
                  <!--                  --><?//= $user['vol_user_status_idStatus']; ?>
                  <?php if($user['vol_user_status_idStatus'] == 1) {
                    echo "Volunteer";
                  } else if($user['vol_user_status_idStatus'] == 2) {
                    echo "Admin";
                  } ?>
                </td>
                <td class="center-align">
                  <?php if($user['Active'] == null) {
                    echo "NO";
                  } else {
                    echo "YES";
                  } ?>
                </td>
                <td class="center-align">
                  <a href="singleuser/<?= $user['idUser']; ?>" class="btn green">
                    <i class="mdi-action-search"></i> view
                  </a>
                </td>
                <td class="center-align">
                  <a href="edituser/<?= $user['idUser']; ?>" class="btn blue">
                    <i class="mdi-content-create"></i> edit
                  </a>
                </td>
                <td class="center-align">
                  <a class="btn orange">
                    <i class="mdi-content-clear"></i> disable
                  </a>
                </td>
                <td class="center-align">
                  <a class="btn red">
                    <i class="mdi-content-clear"></i> delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>


    <script type="text/javascript" src="assets/dataTables/js/jquery.dataTables.min.js"></script>
    <script>
      $('#table1').DataTable({
        "bLengthChange": false,
        "iDisplayLength": 5,
        "filter": false
      });
    </script>

  </section>
  <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>