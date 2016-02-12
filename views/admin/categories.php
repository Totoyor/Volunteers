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
    <div class="card">
        <div class="title">
            <h5>Categories</h5>
            <a class="minimize" href="#">
                <i class="mdi-navigation-expand-less"></i>
            </a>
        </div>
        <div class="content">
            <table id="table1" class="display table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($data)): ?>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <tr>
                            <td>
                                <?= $category['nameCategorie']; ?>
                            </td>
                            <td class="center-align">
                                <a class="btn"><i class="mdi-editor-mode-edit"></i>Edit</a>
                            </td>
                            <td class="center-align">
                                <a href="categories/<?= $category['idCategorie']; ?>"
                                   class="btn red darken-1"
                                   onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="mdi-action-delete"></i>Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="title">
            <h5>Add a category</h5>
            <a class="minimize" href="#">
                <i class="mdi-navigation-expand-less"></i>
            </a>
        </div>
        <div class="content">
            <form action="?module=admin&action=categories" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="category" type="text" class="validate" name='category'>
                        <label for="category">Category name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="catPicture" type="file" data-height="200" class="dropify" />
                    </div>
                </div>
                <div class="row">
                    <div class="input-field center-align">
                        <button type="submit" class="btn orange lighten-1">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>

<script>
    $('#table1').DataTable({
        "bLengthChange": false,
        "iDisplayLength": 5,
        "filter": false
    });
</script>