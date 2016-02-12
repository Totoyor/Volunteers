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
                                <a href="<?= PATH_HOME ?>admin/categories/<?= $category['idCategorie']; ?>/edit" class="btn"><i class="mdi-editor-mode-edit"></i>Edit</a>
                            </td>
                            <td class="center-align">
                                <a href="<?= PATH_HOME ?>admin/categories/<?= $category['idCategorie']; ?>/suppr"
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
            <?php if(isset($data['edit'])) { ?>
                <h5>Edit a category</h5>
            <?php } else { ?>
                <h5>Add a category</h5>
            <?php } ?>
            <a class="minimize" href="#">
                <i class="mdi-navigation-expand-less"></i>
            </a>
        </div>
        <div class="content">
            <?php if(isset($data['edit'])) { ?>
                <form action="<?= PATH_HOME ?>admin/editcategories" method="post" enctype="multipart/form-data">
            <?php } else { ?>
                <form action="<?= PATH_HOME ?>admin/insertcategories" method="post" enctype="multipart/form-data">
            <?php } ?>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="category"
                               type="text"
                               class="validate"
                               name='category'
                               value="<?php if (isset($data['edit'])) {
                                   if (!empty($data['edit'][0]['nameCategorie'])) {
                                       echo $data['edit'][0]['nameCategorie'];
                                   }
                               } ?>"
                               required />
                        <label for="category">Category name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="catPicture"
                               type="file"
                               data-height="200"
                               class="dropify"
                                <?php if (isset($data['edit'])) {
                                    if (!empty($data['edit'][0]['imageCategorie'])) { ?>
                                        data-default-file="<?= PATH_HOME ?>assets/img/categories/uploads/<?= $data['edit'][0]['imageCategorie']; ?>"
                                    <?php }
                                } ?>
                                />
                        <?php if(isset($data['edit'])) {
                            if(!empty($data['edit'][0]['imageCategorie'])) { ?>
                                <input type="hidden" name="catPictureSave" value="<?= $data['edit'][0]['imageCategorie']; ?>">
                                <input type="hidden" name="idCategory" value="<?= $data['edit'][0]['idCategorie']; ?>">
                            <?php }
                        } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field center-align">
                        <?php if(isset($data['edit'])) { ?>
                            <button type="submit" class="btn orange lighten-1">EDIT</button>
                        <?php } else { ?>
                            <button type="submit" class="btn orange lighten-1">ADD</button>
                        <?php } ?>

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