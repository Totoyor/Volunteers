<?php include_once('layout/adminheader.inc.php'); ?>
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
          <a href="ecommerce-product-single.html" class="btn btn-small z-depth-0"><i class="mdi mdi-content-add"></i></a>
          <a href="ecommerce-product-single.html" class="btn btn-small z-depth-0"><i class="mdi mdi-editor-mode-edit"></i></a>
          <a href="#" class="btn btn-small red lighten-1 z-depth-0"><i class="mdi mdi-action-delete"></i></a>
        </div>
      </div>
      <div class="content">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="assets/_con/images/ecommerce-apple-iphone-30x30.jpg" alt="Teknival">
              </td>
              <td>
                <a href="singleevent">
                  <strong class="grey-text text-darken-2">Teknival</strong>
                  <br>
                  <span class="grey-text">3 jours de gros son en continu. Hardtek, Hardcore, Drum n Bass, Punk. Du lourd lourd lourd</span>
                </a>
              </td>
              <td class="green-text">Active</td>
              <td><a href="admin/singleEvent" class="btn btn-small z-depth-0"><i class="mdi mdi-editor-mode-edit"></i></a>
              </td>
              <td><a href="admin/singleEvent" class="btn btn-small z-depth-0"><i class="mdi mdi-action-delete"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /Products -->


  </section>
  <!-- /Main Content -->
<?php include_once('layout/adminfooter.inc.php'); ?>