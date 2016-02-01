<?php include_once('views/layout/header.inc.php'); ?>
    <div class="container">
        <div class="page-content">
            <div class="row margtop100">
                <div class="col l3 m12 s12 colbg nopadding">
                    <div class="card noborder">
                        <div class="card panel colbg noborder center">
                            <div class="panel-text">
                                <img class="resposive-img circle" src="assets/img/square_face.png" width="100"
                                     height="100">
                                <h2 class="name-profile nospace">Salim</h2>
                                <a href="profilepublic.php">See profile as public</a><br/>
                            </div>
                        </div>
                    </div>
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
                            <th data-field="id">Date<!--<i class="tiny material-icons right rotate">play_arrow</i>--></th>
                            <th data-field="name">Event</th>
                            <th data-field="price">Status</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php if(!empty($data['missionsNok'])){ ?>
                                <?php foreach($data['missionsNok'] as $missionsNok): ?>
                                    <tr>
                                        <td><?= $missionsNok['startEvent']; ?></td>
                                        <td>
                                            <a href="event/show/<?= $missionsNok['idEvent']; ?>"><?= $missionsNok['nameEvent']; ?></a>
                                        </td>
                                        <td>Request has been send</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td>Vous n'avez postulez pour aucun évènements pour le moment</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                    <table id="test5" class="striped responsive-table table-missions">
                        <thead>
                        <tr>
                            <th data-field="id">Date<!--<i class="tiny material-icons right rotate">play_arrow</i>--></th>
                            <th data-field="name">Event</th>
                            <th data-field="price">Status</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php if(!empty($data['missionsOk'])){ ?>
                                <?php foreach($data['missionsOk'] as $missionsOk): ?>
                                    <tr>
                                        <td><?= $missionsOk['startEvent']; ?></td>
                                        <td>
                                            <a href="event/show/<?= $missionsOk['idEvent']; ?>"><?= $missionsOk['nameEvent']; ?></a>
                                        </td>
                                        <td>Hired</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td>Vous ne participez à aucun évènement pour le moment</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div><!-- fin col-->
            </div><!-- fin row-->
        </div>
    </div>
<?php include_once('views/layout/footer.inc.php'); ?>