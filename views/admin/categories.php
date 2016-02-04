<?php include_once('views/layout/adminheader.inc.php'); ?>
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
                <?php if (isset($data)): ?>
                    <?php foreach ($data['categories'] as $category) : ?>
                	    <tr>
                        <form action="?module=admin&action=categories" method="post">

                  	      <td><?= $category['idCategorie']; ?></td>
                  	      <td><input type="text" class="validate" name="<?php echo $category['idCategorie']; ?>" value="<?php echo $category['nameCategorie']; ?>"></td>
                  	      <td><a class="btn"><i class="mdi-editor-mode-edit"></i>Edit</a>
        </td>
                  	      <td><a href="categories/<?= $category['idCategorie']; ?>" class="btn red darken-1" onclick="return confirm('Are you sure you want to delete this item?');"><i class="mdi-action-delete"></i>Delete</a>
        </td>
                        </form>
                	    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
          	  </tbody>
          	</table>
        </div>
      </div>
      <div class="col s12 l6">
        <div class="card-panel">
          <h2>Add Category</h2>
          <form action="?module=admin&action=categories" method="post">
          	<div class="input-field">
          	  <input id="category" type="text" class="validate" name='category'>
          	  <label for="category">Add category</label>
          	</div>
          	<button href="#" class="btn orange lighten-1">SEND</button>
          </form>
        </div>
      </div>

    </div>

  </section>
<?php include_once('views/layout/adminfooter.inc.php'); ?>