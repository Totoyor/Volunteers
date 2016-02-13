<?php include_once('views/layout/adminheader.inc.php'); ?>
    <!-- Main Content -->
    <section class="content-wrap ecommerce-product-single">
        <!-- Breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col s12 m9 l10">
                    <h1>Edit Event</h1>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        <form method="post" action="<?= PATH_HOME ?>admin/edit">
            <div class="card">
                <div class="title">
                    <h5>Description</h5>
                    <a class="minimize" href="#">
                        <i class="mdi-navigation-expand-less"></i>
                    </a>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="input-field col s9">
                            <input id="input_email"
                                   name="event_name"
                                   type="text"
                                   class="validate"
                                   value="<?php if (isset($data['event']['nameEvent']) && !empty($data['event']['nameEvent'])) {
                                       echo $data['event']['nameEvent'];
                                   } ?>"
                                   required>
                            <label for="input_email">Event name</label>
                        </div>
                    </div>

                    <div class="more_margin"></div>
                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="input-field col s9">
                            <input id="input_email"
                                   name="event_location"
                                   type="text"
                                   value="<?php if (isset($data['event']['locationEvent']) && !empty($data['event']['locationEvent'])) {
                                       echo $data['event']['locationEvent'];
                                   } ?>"
                                   class="validate">
                            <label for="input_email">Location</label>
                        </div>
                    </div>

                    <div class="more_margin"></div>
                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="input-field col s9">
                            <i class="mdi-action-event prefix"></i>
                            <input name="event_start"
                                   class="datepicker"
                                   id="input_date"
                                   value="<?php if (isset($data['event']['startEvent']) && !empty($data['event']['startEvent'])) {
                                       echo $data['event']['startEvent'];
                                   } ?>"
                                   type="date">
                            <label for="input_date">Beginning</label>
                        </div>
                        <br>

                        <div class="col s3 l3 m3">
                            <p><a class="showend">+ Add End Date</a></p>
                        </div>
                    </div>

                    <div class="more_margin"></div>
                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="input-field newdate col s9">
                            <i class="mdi-action-event prefix"></i>
                            <input name="event_end"
                                   id="icon_prefix"
                                   type="date"
                                   value="<?php if (isset($data['event']['endEvent']) && !empty($data['event']['endEvent'])) {
                                       echo $data['event']['endEvent'];
                                   } ?>"
                                   class="datepicker">
                            <label for="input_date">End</label>
                        </div>
                    </div>

                    <div class="more_margin"></div>
                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="input-field col s6 m3">
                            <select name="event_hour_start">
                                <option value="" disabled selected>Hour</option>
                                <option value="0">00</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <label>Starting</label>
                        </div>

                        <div class="input-field col s6 m3">
                            <select name="event_min_start">
                                <option value="" disabled selected>Min</option>
                                <option value="00">00</option>
                                <option value="05">05</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                                <option value="55">55</option>
                            </select>
                            <label></label>
                        </div>

                        <div class="input-field col s6 m3 tooltipped" data-position="right" data-delay="50"
                             data-tooltip="When?">
                            <select name="event_start_mode">
                                <option value="" disabled selected>AM - PM</option>
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                            </select>
                            <label></label>
                        </div>

                        <?php if (isset($data['event']['hourStartEvent']) && !empty($data['event']['hourStartEvent'])) { ?>
                            <div class="input-field col s4 m2">
                                <input type="text" value="<?= $data['event']['hourStartEvent'] ?>" disabled>
                                <input type="hidden" name="hourStartSave" value="<?= $data['event']['hourStartEvent'] ?>">
                            </div>
                        <?php } ?>
                    </div>

                    <div class="more_margin"></div>
                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="input-field col s6 m3 ">
                            <select name="event_hour_end">
                                <option value="" disabled selected>Hour</option>
                                <option value="0">00</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <label>Ending</label>
                        </div>

                        <div class="input-field col s6 m3">
                            <select name="event_min_end">
                                <option value="" disabled selected>Min</option>
                                <option value="00">00</option>
                                <option value="05">05</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                                <option value="55">55</option>
                            </select>
                            <label></label>
                        </div>

                        <div class="input-field col s6 m3 ">
                            <select name="event_end_mode">
                                <option value="" disabled selected>AM - PM</option>
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                            </select>
                            <label></label>
                        </div>

                        <?php if (isset($data['event']['hourEndEvent']) && !empty($data['event']['hourEndEvent'])) { ?>
                            <div class="input-field col s4 m2">
                                <input type="text" value="<?= $data['event']['hourEndEvent'] ?>" disabled>
                                <input type="hidden" name="hourEndSave" value="<?= $data['event']['hourEndEvent'] ?>">
                            </div>
                        <?php } ?>
                    </div>

                    <div class="more_margin"></div>
                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="input-field col s9">
                            <textarea name="event_description" id="textarea1"
                                      class="materialize-textarea"><?php if (isset($data['event']['descriptionEvent']) && !empty($data['event']['descriptionEvent'])) {
                                    echo $data['event']['descriptionEvent'];
                                } ?>
                            </textarea>
                            <label for="textarea1">Textarea</label>
                        </div>
                    </div>

                    <div class="more_margin"></div>
                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="input-field col s6">
                            <select name="event_categories[]" class="icons" multiple>
                                <option value="" disabled selected>Categories</option>
                                <?php foreach ($data['categories'] as $category) {
                                    ?>
                                    <option
                                        value="<?= $category['idCategorie']; ?>"><?= $category['nameCategorie']; ?></option>
                                    <?php
                                } ?>
                            </select>
                            <label>Choose your categories</label>
                        </div>

                        <?php if (!empty($data['event']['nameCategorie'])) { ?>
                            <div class="input-field col s4 m2">
                                <input type="text" value="<?= $data['event']['nameCategorie'] ?>" disabled>
                                <input type="hidden" name="categorieSave"
                                       value="<?= $data['event']['idCategorie'] ?>">
                            </div>
                        <?php } ?>
                    </div>

                    <div class="more_margin"></div>
                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="input-field col s3">
                            <input id="input_email"
                                   name="facebook"
                                   type="text"
                                   value="<?php if (isset($data['event']['facebookEvent']) && !empty($data['event']['facebookEvent'])) {
                                       echo $data['event']['facebookEvent'];
                                   } ?>"
                                   class="validate">
                            <label for="facebook">Facebook</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="input_email"
                                   name="instagram"
                                   type="text"
                                   value="<?php if (isset($data['event']['instagramEvent']) && !empty($data['event']['instagramEvent'])) {
                                       echo $data['event']['instagramEvent'];
                                   } ?>"
                                   class="validate">
                            <label for="instagram">Instagram</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="input_email"
                                   name="youtube"
                                   type="text"
                                   value="<?php if (isset($data['event']['youtubeEvent']) && !empty($data['event']['youtubeEvent'])) {
                                       echo $data['event']['youtubeEvent'];
                                   } ?>"
                                   class="validate">
                            <label for="youtube">Youtube</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="input_email"
                                   name="twitter"
                                   type="text"
                                   value="<?php if (isset($data['event']['twitterEvent']) && !empty($data['event']['twitterEvent'])) {
                                       echo $data['event']['twitterEvent'];
                                   } ?>"
                                   class="validate">
                            <label for="twitter">Twitter</label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="title">
                    <h5>Medias</h5>
                    <a class="minimize" href="#">
                        <i class="mdi-navigation-expand-less"></i>
                    </a>
                </div>
                <div class="content">

                    <div class="row">
                        <div class="input-field col s12 l12 m12">
                            <input name="coverPicture"
                                   type="file"
                                   id="input-file-now"
                                   data-height="200"
                                   data-default-file="
                                   <?php if (!empty($data['event']['coverPicture'])) {
                                       echo PATH_HOME."assets/img/events/uploads/" . $data['event']['coverPicture'];
                                   } else {
                                       echo PATH_HOME."assets/img/couv_default.jpg";
                                   } ?>"
                                   class="dropify"/>

                            <?php if (!empty($data['event']['coverPicture'])) { ?>
                                <input type="hidden" name="coverPictureSave"
                                       value="<?= $data['event']['coverPicture'] ?>">
                            <?php } ?>

                        </div>
                    </div>

                    <div class="row">
                        <?php for ($i = 0; $i < 4; $i++) { ?>
                            <div class="input-field col s3">

                                <input name="media[]"
                                       type="file"
                                       id="input-file-now"
                                       data-height="90"
                                       class="dropify"
                                    <?php if (!empty($data['medias'][$i]['eventPicture'])) { ?>
                                       data-default-file="<?= PATH_HOME ?>assets/img/events/uploads/<?= $data['medias'][$i]['eventPicture']; ?>"/>
                                <?php } ?>

                                <input type="hidden" name="mediasSave[]"
                                       value="<?php if (!empty($data['medias'][$i])) { ?>
                                    <?= $data['medias'][$i]['eventPicture']; ?>
                                <?php } ?>"/>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="title">
                    <h5>Volunteers</h5>
                    <a class="minimize" href="#">
                        <i class="mdi-navigation-expand-less"></i>
                    </a>
                </div>
                <div class="content">
                    <div class="row">
                        <?php if (!empty($data['missions'])) { ?>
                            <?php foreach ($data['missions'] as $mission): ?>
                                <div id="first-mission-field" class="top-space tooltipped"
                                     data-delay="50" data-position="right"
                                     data-tooltip="What kind of missions for your volunteers?">
                                    <div class="input-field col s9 secure-mission">
                                        <i class="mdi-action-account-circle prefix"></i>
                                        <input name="missionsSave[]"
                                               id="icon_prefix"
                                               placeholder="Barman"
                                               type="text"
                                               class="validate"
                                               value="<?= $mission['missionName'] ?>">
                                        <label for="icon_prefix">Mission</label>
                                    </div>
                                    <div class="input-field col s3 secure_nb_vol">
                                        <div class="input-field col secure-mission">
                                            <input name="nbVolunteerSave[]"
                                                   placeholder="1"
                                                   type="number"
                                                   min="0"
                                                   class="validate"
                                                   value="<?= $mission['nbVolunteer'] ?>">
                                            <label>Number</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="idMissionsSave[]" value="<?= $mission['idEventMission'] ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <div id="first-mission-field" class="top-space tooltipped"
                                 data-delay="50" data-position="right"
                                 data-tooltip="What kind of missions for your volunteers?">
                                <div class="input-field col s9 secure-mission">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input name="missions[]" id="icon_prefix" placeholder="Barman" type="text"
                                           class="validate">
                                    <label for="icon_prefix">Mission</label>
                                </div>
                                <div class="input-field col s3 secure_nb_vol">
                                    <div class="input-field col secure-mission">
                                        <input name="nbVolunteer[]" placeholder="1" type="number" min="0" class="validate">
                                        <label>Number</label>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div id="mission-field" class="tooltipped mission hide" data-position="right" data-delay="50"
                             data-tooltip="What kind of missions for your volunteers?">
                            <div class="input-field col s9 secure-mission">
                                <i class="mdi-action-account-circle prefix"></i>
                                <input name="missions[]" id="icon_prefix" placeholder="Barman" type="text" class="validate">
                                <label for="icon_prefix">Mission</label>
                            </div>
                            <div class="input-field col s3 secure_nb_vol">
                                <div class="input-field col secure-mission">
                                    <input name="nbVolunteer[]" placeholder="1" type="number" min="0" class="validate">
                                    <label>Number</label>
                                </div>
                            </div>
                        </div>
                        <div id="new-mission"></div>
                        <div class="row">
                            <div class="left col">
                                <a class="btn btn-bleu addmiss">+ Add </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="userCreator" value="<?php if(isset($data['event']['idUser'])) {
                echo $data['event']['idUser'];
            } ?>">
            <input type="hidden" name="idEvent" value="<?php if(isset($data['event']['idEvent'])) {
                echo $data['event']['idEvent'];
            } ?>">
            <div class="row">
                <div class="center-align">
                    <button class="btn red">Cancel</button>
                    <button type="submit" name="save" class="btn orange">Save</button>
                    <button type="submit" name="submit" class="btn green">Publish</button>
                </div>
            </div>
            <br>
        </form>
    </section>
    <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>