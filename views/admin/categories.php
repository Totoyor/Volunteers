<?php include_once('layout/adminheader.inc.php'); ?>
  <section class="content-wrap">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Create Event</h1>
        </div>
      </div>

    </div>
    <!-- /Breadcrumb -->


    <div class="row">
      <div class="col s12 l6">
      	<div class="card-panel">
      		<h2>Categories</h2>
      		<!-- Liste des catégories -->
          	<table class="table table-striped">
          	  <thead>
          	    <tr>
          	      <th>#</th>
          	      <th>Category names</th>
          	      <th>Edit</th>
          	      <th>Delete</th>
          	    </tr>
          	  </thead>
          	  <tbody>
          	    <tr>
          	      <th>1</th>
          	      <td>Techno</td>
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
          <h2>Add Category</h2>
          <form action="#!">
          	<div class="input-field">
          	  <input id="add_category" type="text" class="validate" >
          	  <label for="add_category">Add category</label>
          	</div>
          	<button name="submit" href="#" class="btn orange lighten-1">SEND</button>
          </form>
        </div>
      </div>

    </div>

  </section>
<?php include_once('layout/adminfooter.inc.php'); ?>