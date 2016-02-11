<?php include_once('views/layout/adminheader.inc.php'); ?>
    <section class="content-wrap">
        <!-- Breadcrumb -->
        <div class="page-title">

            <div class="row">
                <div class="col s12 m9 l10">
                    <h1>User status</h1>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        <div class="row">
            <div class="col s12 l6">
                <div class="card-panel">
                    <h2>Status list</h2>
                    <!-- Liste des catégories -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Status names</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $status) { ?>
                        <tr>
                            <th><?= $status['idStatus']; ?></th>
                            <td><?= $status['Status']; ?></td>
                            <td><a href="editstatus/<?= $status['idStatus']; ?>" class="btn"><i class="mdi-editor-mode-edit"></i>Edit</a>
                            </td>
                            <td><a onclick="return confirm('Are you sure you want to delete this ?');" href="deletestatus/<?= $status['idStatus']; ?>" class="btn red darken-1"><i class="mdi-action-delete"></i>Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col s12 l6">
                <div class="card-panel">
                    <h2>Add Status</h2>
                    <form action="<?= PATH_HOME ?>admin/addstatus" method="post">
                        <div class="input-field">
                            <input id="add_category" type="text" class="validate" name="status" required>
                            <label for="add_category">Add status</label>
                        </div>
                        <button type="submit" class="btn orange lighten-1">add</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include_once('views/layout/adminfooter.inc.php'); ?>