<?php include_once('views/layout/adminheader.inc.php'); ?>
<!-- Main Content -->
<section class="content-wrap ecommerce-customers">
    <!-- Breadcrumb -->
    <div class="page-title">

        <div class="row">
            <div class="col s12 m9 l10">
                <h1>Moderate Reviews</h1>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    <table id="table1" class="display table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>ID User</th>
            <th>Email</th>
            <th>Rate</th>
            <th>Date</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($data)): ?>
            <?php foreach ($data['rates'] as $rate) : ?>
                <tr>
                    <td class="center-align">
                        <a href="<?= PATH_HOME ?>admin/edituser/<?= $rate['id_user_rating']; ?>"><?= $rate['id_user_rating']; ?></a>
                    </td>
                    <td class="center-align">
                        <?= $rate['Email']; ?>
                    </td>
                    <td class="center-align">
                        <?= $rate['rating']." / 6"; ?>
                    </td>
                    <td class="center-align">
                        <?= $rate['date']; ?>
                    </td>
                    <td class="center-align">
                        <a class="btn blue" href="<?= PATH_HOME ?>profile/show/<?= $rate['id_user_rating']; ?>">
                            view
                        </a>
                    </td>
                    <td class="center-align">
                        <a onclick="return confirm('Are you sure you want to delete this ?');" href="<?= PATH_HOME ?>admin/deleterate/<?= $rate['idVolunteerRating']; ?>" class="btn red">
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
        "iDisplayLength": 5,
        "filter": false
    });
</script>
