<?php include_once('views/layout/adminheader.inc.php'); ?>
    <!-- Main Content -->
    <section class="content-wrap">
        <!-- Breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col s12 m9 l10">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        <!-- Stats Panels -->
        <div class="row sortable">
            <div class="col l6 m6 s12">
                <a href="<?= PATH_HOME ?>admin/userlist" class="card-panel stats-card red lighten-2 red-text text-lighten-5">
                    <i class="fa fa-comments-o"></i>
                    <span class="count"><?php echo count($data['users']); ?></span>
                    <div class="name">Users</div>
                </a>
            </div>
            <div class="col l6 m6 s12">
                <a href="<?= PATH_HOME ?>admin/eventlist" class="card-panel stats-card blue lighten-2 blue-text text-lighten-5">
                    <i class="fa fa-send"></i>
                    <span class="count"><?php echo count($data['events']); ?></span>
                    <div class="name">Events</div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col l6">
                <table id="table1" class="display table table-bordered table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Nom / Email</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($data)): ?>
                        <?php foreach ($data['users'] as $user) : ?>
                            <tr>
                                <td class="center-align">
                                    <?= $user['idUser']; ?>
                                </td>
                                <td class="center-align">
                                    <?= $user['Email']; ?>
                                </td>
                                <td class="center-align">
                                    <?= $user['DateRegister']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="col l6">
                <table id="table1" class="display table table-bordered table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID Event</th>
                        <th>Nom Event</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($data)): ?>
                        <?php foreach ($data['events'] as $event) : ?>
                            <tr>
                                <td class="center-align">
                                    <?= $event['idEvent']; ?>
                                </td>
                                <td class="center-align">
                                    <?= $event['nameEvent']; ?>
                                </td>
                                <td class="center-align">
                                    <?= $event['dateCreate']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Stats Panels -->
    </section>
    <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>