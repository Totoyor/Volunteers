<?php include_once('views/layout/adminheader.inc.php'); ?>
    <section class="content-wrap">
        <!-- Breadcrumb -->
        <div class="page-title">

            <div class="row">
                <div class="col s12 m9 l10">
                    <h1>User statuses</h1>
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
                        <tr>
                            <th>1</th>
                            <td>Admin</td>
                            <td><a class="btn"><i class="mdi-editor-mode-edit"></i>Edit</a>
                            </td>
                            <td><a class="btn red darken-1"><i class="mdi-action-delete"></i>Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col s12 l6">
                <div class="card-panel">
                    <h2>Add Status</h2>
                    <form action="#!">
                        <div class="input-field">
                            <input id="add_category" type="text" class="validate">
                            <label for="add_category">Add status</label>
                        </div>
                        <button name="submit" href="#" class="btn orange lighten-1">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include_once('views/layout/adminfooter.inc.php'); ?>