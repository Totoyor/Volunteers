<?php include_once('views/layout/header.inc.php'); ?>
<div class="container">
    <div class="page-content">
        <div class="row">
            <div class="col l12">
                <h1 class="title-section">Volunteers for this event</h1>
            </div>
        </div>
        <div class="row">
            <div class="col l9 m12 s12">
                <form method="post" action="event/hire">
                    <table class="striped responsive-table table-missions">
                        <thead>
                        <tr>
                            <th>Hire</th>
                            <th>Name</th>
                            <th>Mail</th>
                            <th data-field="name">Rating</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($data['volunteers'])) { ?>
                            <?php foreach($data['volunteers'] as $volunteer): ?>
                                <input type="hidden" name="idEvent" value="<?= $data['volunteers'][0]['vol_events_idEvent'] ?>">
                                <tr>
                                    <td>
                                        <input name="hire[]" value="<?= $volunteer['idUser'] ?>" type="checkbox" id="test5"/>
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
                                        <?= $volunteer['AVG(vol_users_rating.rating)']." / 6"; ?>
                                    </td>
                                    <td>
                                        <a href="profile/show/<?= $volunteer['idUser']; ?>" class="btn btn-blue">view</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr>
                                <td>0 Volunteer participating in your event</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php if($data['event']['hireSession'] == 1) { ?>
                        <button type="submit" class="btn btn-orange" disabled>Hire already done</button>
                    <?php } else if(!empty($data['volunteers'])) { ?>
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