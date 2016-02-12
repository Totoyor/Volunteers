<?php include_once('views/layout/adminheader.inc.php'); ?>
    <!-- Main Content -->
    <section class="content-wrap">
        <!-- Breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col s12 m9 l10">
                    <h1>Edit status</h1>
                </div>

            </div>
            <!-- /Breadcrumb -->
        </div>
        <form class="login-form" action="<?= PATH_HOME ?>admin/editstatusadmin" method="post">
            <div class="row">
                <div class="col l9 m12 s12">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s4"><a class="active" href="#required">Required information</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card panel" id="required">
                        <div class="row">
                            <div class="row">
                                <div class="col l6 s12">
                                    <div class="input-field">
                                        <input placeholder="Volunteer/Organizer" id="label_status" type="text" class="validate"
                                               name="status" value="<?php echo $data['Status']; ?>" required>
                                        <label for="label_status">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" value="<?= $data['idStatus'] ?>" name="idStatus">
                            </div>
                        </div>
                    </div><!-- fin card panel-->
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-orange">Save</button>
            </div>
        </form>
    </section>
    <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>