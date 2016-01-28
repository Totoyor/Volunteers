<?php include_once('views/layout/header.inc.php'); ?>
<div class="container">
    <div class="page-content">
        <div class="row">
            <div class="col l12">
                <h1 class="title-section">They volunteer at this event</h1>
            </div>
        </div>
        <div class="row">
            <div class="col l9 m12 s12">
                <form method="get">
                    <table class="striped responsive-table table-missions">
                        <thead>
                        <tr>
                            <th>To hire</th>
                            <th>Name</th>
                            <th>Mail</th>
                            <th data-field="name">Rating</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($data['volunteers'])) { ?>
                            <?php foreach($data['volunteers'] as $volunteer): ?>
                                <tr>
                                    <td>
                                        <input name="hire[]" type="checkbox" id="test5"/>
                                        <label for="test5"></label>
                                    </td>
                                    <td>
                                        <?php if(!empty($volunteer['FirstName']) && !empty($volunteer['LastName'])) { ?>
                                            <?= $volunteer['FirstName']." ".$volunteer['LastName']; ?>
                                        <?php } else { ?>
                                            Volunteer
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?= $volunteer['Email']; ?>
                                    </td>
                                    <td>
                                        5/5
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr>
                                <td>0 Volunteer participate to your event</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php if(!empty($data['volunteers'])) { ?>
                        <button type="submit" class="btn btn-orange">Hire selected</button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-orange" disabled>Hire selected</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('views/layout/footer.inc.php'); ?>