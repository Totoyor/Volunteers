<?php include_once('views/layout/adminheader.inc.php'); ?>
    <!-- Main Content -->
    <section class="content-wrap ecommerce-products">
        <!-- Breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col s12 m9 l10">
                    <h1>Event List</h1>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        <!-- Products -->
        <div class="content">
            <table id="table1" class="display table table-bordered table-striped table-hover table-responsive">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th style="width: 80px;">Status</th>
                    <th style="width: 80px;">View Vol</th>
                    <th style="width: 50px;">View</th>
                    <th style="width: 50px;">Edit</th>
                    <th style="width: 50px;">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($data)): ?>
                    <?php foreach ($data['events'] as $event) : ?>
                        <tr>
                            <td>
                                <?php if (!empty($event['coverPicture'])) { ?>

                                    <?php $filename = 'assets/img/events/uploads/' . $event['coverPicture']; ?>

                                    <?php if (file_exists($filename)) { ?>

                                        <img width="200" class="responsive-img"
                                             src="<?php echo PATH_HOME ?>assets/img/events/uploads/<?= $event['coverPicture']; ?>"
                                             alt="<?= $event['nameEvent']; ?>">

                                    <?php } else { ?>

                                        <h3>DEAD FILE</h3>

                                    <?php } ?>

                                <?php } else { ?>
                                    <img width="200" class="responsive-img"
                                         src="<?= PATH_HOME ?>assets/img/couv_default.jpg"
                                         alt="image-event">
                                <?php } ?>
                            </td>
                            <td>
                                <a href="singleevent/<?= $event['idEvent']; ?>">
                                    <strong class="grey-text text-darken-2"><?= $event['nameEvent']; ?></strong>
                                </a>
                            </td>
                            <td class="green-text">
                                <?php if ($event['vol_event_status_idEventStatus'] == 0) {
                                    echo("Saved");
                                } else if ($event['vol_event_status_idEventStatus'] == 1) {
                                    echo("Active");
                                } else if ($event['vol_event_status_idEventStatus'] == 2) {
                                    echo("Premium");
                                } ?>
                            </td>
                            <td>
                                <a href="<?php echo PATH_HOME ?>admin/singleevent/<?= $event['idEvent']; ?>"
                                   class="btn z-depth-0"><i class="mdi-action-face-unlock"></i></a>
                            </td>
                            <td><a href="<?php echo PATH_HOME ?>admin/singleevent/<?= $event['idEvent']; ?>"
                                   class="btn z-depth-0 green"><i class="mdi mdi-action-visibility"></i></a>
                            </td>
                            <td><a href="<?php echo PATH_HOME ?>admin/singleevent/<?= $event['idEvent']; ?>"
                                   class="btn z-depth-0 orange"><i class="mdi mdi-editor-mode-edit"></i></a>
                            </td>
                            <td><a href="<?php echo PATH_HOME ?>admin/deleteevent/<?= $event['idEvent']; ?>"
                                   class="btn z-depth-0 red darken-1"
                                   onclick="return confirm('Are you sure you want to delete this item?');"><i
                                        class="mdi mdi-action-delete"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- /Products -->
    </section>
    <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>
<script>
    $('#table1').DataTable({
        "bLengthChange": false,
        "iDisplayLength": 6,
        "filter": false
    });
</script>
