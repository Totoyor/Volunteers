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
                <a href="#" class="card-panel stats-card red lighten-2 red-text text-lighten-5">
                    <i class="fa fa-comments-o"></i>
                    <span class="count"><?php echo count($data['users']); ?></span>
                    <div class="name">Users</div>
                </a>
            </div>
            <div class="col l6 m6 s12">
                <a href="#" class="card-panel stats-card blue lighten-2 blue-text text-lighten-5">
                    <i class="fa fa-send"></i>
                    <span class="count"><?php echo count($data['events']); ?></span>
                    <div class="name">Events</div>
                </a>
            </div>
        </div>
        <!-- /Stats Panels -->
    </section>
    <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>