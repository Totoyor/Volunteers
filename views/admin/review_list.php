<?php include_once('views/layout/adminheader.inc.php'); ?>
<!-- Main Content -->
<section class="content-wrap ecommerce-customers">
    <!-- Breadcrumb -->
    <div class="page-title">

        <div class="row">
            <div class="col s12 m9 l10">
                <h1>Reviews / Rates</h1>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    <table id="table1" class="display table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Mail</th>
            <th>Comments</th>
            <th>Rates</th>
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
                        <a href="<?= PATH_HOME ?>profile/show/<?= $user['idUser']; ?>" class="btn green">
                            <i class="mdi-action-search"></i> comments
                        </a>
                    </td>
                    <td class="center-align">
                        <a class="btn red">
                            <i class="mdi-action-search"></i> rates
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
