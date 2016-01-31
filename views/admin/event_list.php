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
    <div class="card">
      <div class="title">
        <h5>Events</h5>
        <div class="btn-group right">
          <a href="<?php echo PATH_HOME ?>admin/createevent" class="btn btn-small z-depth-0"><i class="mdi mdi-content-add"></i></a>
        </div>
      </div>
      <div class="content">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th style="width: 80px;">Status</th>
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
                      <?php if(!empty($event['coverPicture'])) { ?>
                          <img class="responsive-img"
                           src="<?php echo PATH_HOME ?>assets/img/events/uploads/<?= $event['coverPicture']; ?>"
                           alt="<?= $event['nameEvent']; ?>">
                      <?php } else { ?>
                          <img class="responsive-img"
                               src="assets/img/couv_default.jpg"
                               alt="image-event">
                      <?php } ?>
                    </td>
                    <td>
                      <a href="singleevent/<?= $event['idEvent']; ?>">
                        <strong class="grey-text text-darken-2"><?= $event['nameEvent']; ?></strong>
                        <br>
                        <span class="grey-text"><?= $event['descriptionEvent']; ?></span>
                      </a>
                    </td>
                    <td class="green-text">
                      <?php if ($event['vol_event_status_idEventStatus'] == 0){
                            echo("Saved");
                          } else if ($event['vol_event_status_idEventStatus'] == 1) {
                            echo("Active");
                          }else if ($event['vol_event_status_idEventStatus'] == 2) {
                            echo("Premium");
                      }?>
                    </td>
                    <td><a href="<?php echo PATH_HOME ?>admin/singleevent/<?= $event['idEvent']; ?>" class="btn btn-small z-depth-0"><i class="mdi mdi-action-visibility"></i></a>
                    </td>
                    <td><a href="<?php echo PATH_HOME ?>admin/singleevent/<?= $event['idEvent']; ?>" class="btn btn-small z-depth-0"><i class="mdi mdi-editor-mode-edit"></i></a>
                    </td>
                    <td><a href="<?php echo PATH_HOME ?>admin/singleevent/<?= $event['idEvent']; ?>" class="btn btn-small z-depth-0"><i class="mdi mdi-action-delete"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /Products -->


  </section>
  <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>