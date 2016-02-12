<?php include_once('views/layout/header.inc.php'); ?>
    <div class="container">
        <div class="page-content">
            <div class="row margtop100">
                <div class="col l3 m12 s12 colbg nopadding">
                    <?php include_once('views/layout/nav.profile.php'); ?>
                </div>
                <div class="col l9 m12 s12">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s6"><a class="active" href="#test4">Applied for</a></li>
                                <li class="tab col s6"><a href="#test5">Participated at</a></li>
                            </ul>
                        </div>
                    </div><!-- fin row-->
                    <table id="test4" class="striped responsive-table table-missions">
                        <thead>
                        <tr>
                            <th data-field="id">Date
                                <!--<i class="tiny material-icons right rotate">play_arrow</i>--></th>
                            <th data-field="name">Event</th>
                            <th data-field="price">Status</th>
                            <th data-field="cancel">Cancel</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if (!empty($data['missionsNok'])) { ?>
                            <?php foreach ($data['missionsNok'] as $missionsNok): ?>
                                <tr>
                                    <form method="post" action="user/cancel">
                                        <td><?= $missionsNok['startEvent']; ?></td>
                                        <td>
                                            <a href="event/show/<?= $missionsNok['idEvent']; ?>"><?= $missionsNok['nameEvent']; ?></a>
                                        </td>
                                        <td>Request has been send</td>
                                        <td>
                                            <input type="hidden" name="idEvent" value="<?= $missionsNok['idEvent']; ?>">
                                            <button type="submit" class="btn btn-red"
                                                    onclick="return(confirm('Are you sure ?'));">
                                                cancel
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr>
                                <td>It seems like you don't join any event.</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <table id="test5" class="striped responsive-table table-missions">
                        <thead>
                        <tr>
                            <th data-field="id">Date
                                <!--<i class="tiny material-icons right rotate">play_arrow</i>--></th>
                            <th data-field="name">Event</th>
                            <th data-field="price">Status</th>
                            <th data-field="cancel">Cancel</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if (!empty($data['missionsOk'])) { ?>
                            <?php foreach ($data['missionsOk'] as $missionsOk): ?>
                                <tr>
                                    <form method="post" action="user/cancel">
                                        <td><?= $missionsOk['startEvent']; ?></td>
                                        <td>
                                            <a href="event/show/<?= $missionsOk['idEvent']; ?>"><?= $missionsOk['nameEvent']; ?></a>
                                        </td>
                                        <td>Hired</td>
                                        <td>
                                            <input type="hidden" name="idEvent" value="<?= $missionsOk['idEvent']; ?>">
                                            <button type="submit" class="btn btn-red"
                                                    onclick="return(confirm('Are you sure ?'));">
                                                cancel
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr>
                                <td>It seems like you don't have join any event.</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div><!-- fin col-->
            </div><!-- fin row-->
        </div>
    </div>
<?php include_once('views/layout/footer.inc.php'); ?>