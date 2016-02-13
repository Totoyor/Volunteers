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
            <th>Email</th>
            <th>Rating</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($data)): ?>
            <?php foreach ($data['volunteers'] as $user) : ?>
                <tr>
                    <td class="center-align">
                        <?= $user['Email']; ?>
                    </td>
                    <td class="center-align">
                        <?= $user['AVG(vol_users_rating.rating)']." / 6"; ?>
                    </td>
                    <td class="center-align">
                        <a href="<?= PATH_HOME ?>profile/show/<?= $user['idUser']; ?>" class="btn btn-blue">view profile</a>
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