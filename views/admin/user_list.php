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

  <table id="table1" class="display table table-bordered table-striped table-hover table-responsive">
    <thead>
    <tr>
      <th>Nom / Email</th>
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
              <?= $user['Email']; ?>
            </td>
            <td class="center-align">
              <!--                  --><?//= $user['vol_user_status_idStatus']; ?>
              <?php if($user['vol_user_status_idStatus'] == 1) {
                echo "User";
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
              <a href="<?= PATH_HOME ?>profile/show/<?= $user['idUser']; ?>" class="btn green">
                <i class="mdi-action-search"></i> view
              </a>
            </td>
            <td class="center-align">
              <a href="edituser/<?= $user['idUser']; ?>" class="btn blue">
                <i class="mdi-content-create"></i> edit
              </a>
            </td>
            <td class="center-align">
              <?php if ($user['Active'] == null) { ?>
                <a href="activateuser/<?= $user['idUser']; ?>" class="btn green">
                  <i class="mdi-content-clear"></i> enable
                </a>
              <?php } else { ?>
                <a href="disableuser/<?= $user['idUser']; ?>" class="btn orange">
                  <i class="mdi-content-clear"></i> disable
                </a>
              <?php } ?>
            </td>
            <td class="center-align">
              <a onclick="return confirm('Are you sure you want to delete this account ?');" href="deleteuser/<?= $user['idUser']; ?>" class="btn red">
                <i class="mdi-content-clear"></i> delete
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</section>
<!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>

<script>
    $('#table1').DataTable({
        "bLengthChange": false,
        "iDisplayLength": 10,
        "filter": false
    });
</script>