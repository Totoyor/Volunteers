<?php include_once('views/layout/header.inc.php'); ?>
    <div class="row creabody">
        <div class="page_event col m10 s12 l8">
            <div class="formulaire_crea col l12">
                <div class="row">
                    <div class="center">
                        <h1 class="title-section center bleu"><strong>edit your event</strong></h1>
                        <hr class="fancy-hr">
                    </div>
                    <p class="">
                        Aliqua instituendarum appellat elit singulis. Officia ipsum voluptate a
                        excepteur a proident, si malis malis varias mandaremus, minim iis admodum ut
                        esse, admodum enim ubi nostrud comprehenderit.
                    </p>
                </div>
                <!-----/****FORMS****/---->
                <form method="post" action="event/edit" class="" enctype="multipart/form-data">
                    <div class="row btn_crea1">
                        <div class="right">
                            <?php if (isset($_SESSION['user_id'])) { ?>
                                <button name="save" class="btn btn-menu">Save</button>

                                <button name="submit" class="btn btn-orange"
                                        onclick="Materialize.toast('Published', 4000)">Publish
                                </button>
                            <?php } else { ?>
                                <a name="save" class="btn btn-menu modal-trigger" href="#login">Save</a>

                                <a name="submit" href="#login" class="btn btn-orange modal-trigger">Publish
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row"></div>
                    <!----I-1----->
                    <div class="row">
                        <div class="separateur_form valign-wrapper col l12 m12 s12">
                            <div class="bullet_point">
                                <p class="num_bullet_point">1</p>
                            </div>
                            <div>
                                <h3 class="text_separteur">Let's describe your event !</h3>
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s12 l12 m12">
                        <input name="event_name" class="" name="event_name"
                               data-position="right"
                               data-delay="50"
                               data-tooltip="Show me what you've got !"
                               type="text"
                               value="<?php if (!empty($data['event']['nameEvent'])) {
                                   echo $data['event']['nameEvent'];
                               } ?>"
                               required>
                        <label for="icon_prefix">Event Name</label>
                    </div>
                    <input type="hidden" name="idEvent" value="<?= $data['event']['idEvent']; ?>"/>

                    <div class="row">
                        <div class="input-field col s12 col l12 m12">

                            <input name="event_location"
                                   id="icon_prefix"
                                   type="text"
                                   class="tooltipped validate"
                                   data-position="right"
                                   data-delay="50"
                                   data-tooltip="Where is your event ?"
                                   value="<?php if (!empty($data['event']['locationEvent'])) {
                                       echo $data['event']['locationEvent'];
                                   } ?>">
                            <label for="icon_prefix">Location</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s9 l10 m9">
                            <i class="material-icons prefix">today</i>
                            <input data-position="right"
                                   data-delay="50"
                                   data-tooltip="What day is it?"
                                   name="event_start"
                                   id="icon_prefix"
                                   type="date"
                                   placeholder="Click here to choose the begining"
                                   id="datepicker"
                                   class="validate datepicker tooltipped"
                                   value="<?php if (!empty($data['event']['startEvent'])) {
                                       echo $data['event']['startEvent'];
                                   } ?>">
                            <label for="icon_prefix"></label>
                        </div>
                        <div class="col s3 l2 m3">
                            <p><a class="showend">+ End time</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10 l10 m10 newdate">
                            <i class="material-icons prefix">today</i>
                            <input name="event_end"
                                   id="icon_prefix"
                                   type="date"
                                   placeholder="Click here to choose the ending"
                                   class="datepicker"
                                   value="<?php if (!empty($data['event']['endEvent'])) {
                                       echo $data['event']['endEvent'];
                                   } ?>">
                            <label for="icon_prefix"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4 m2">
                            <select name="event_hour_start">
                                <option value="" disabled selected>Hours</option>
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
                        <div class="input-field col s4 m2">
                            <select name="event_min_start">
                                <option value="" disabled selected>Minutes</option>
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
                        <div class="input-field col s4 m2 tooltipped" data-position="right" data-delay="50"
                             data-tooltip="When?">
                            <select name="event_start_mode">
                                <option disabled selected>AM - PM</option>
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                            </select>
                            <label></label>
                        </div>
                        <?php if (!empty($data['event']['hourStartEvent'])) { ?>
                            <div class="input-field col s4 m2">
                                <input type="text" value="<?= $data['event']['hourStartEvent'] ?>" disabled>
                                <input type="hidden" name="hourStartSave"
                                       value="<?= $data['event']['hourStartEvent'] ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="input-field col s4 m2 offset-m1">
                            <select name="event_hour_end">
                                <option value="" disabled selected>Hours</option>
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
                        <div class="input-field col s4 m2">
                            <select name="event_min_end">
                                <option value="" disabled selected>Minutes</option>
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
                        <div class="input-field col s4 m2 tooltipped" data-position="right" data-delay="50"
                             data-tooltip="When?">
                            <select name="event_end_mode">
                                <option value="" disabled selected>AM - PM</option>
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                            </select>
                            <label></label>
                        </div>
                        <?php if (!empty($data['event']['hourEndEvent'])) { ?>
                            <div class="input-field col s4 m2">
                                <input type="text" value="<?= $data['event']['hourEndEvent'] ?>" disabled>
                                <input type="hidden" name="hourEndSave" value="<?= $data['event']['hourEndEvent'] ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l12 m12">
                            <textarea name="event_description"
                                      id="textarea1 icon_prefix"
                                      class="materialize-textarea tooltipped"
                                      data-tooltip="How awesome is your event ?"
                                      data-position="right"
                                      data-delay="50"><?php if (!empty($data['event']['descriptionEvent'])) {
                                    echo $data['event']['descriptionEvent'];
                                } ?> </textarea>
                            <label for="textarea1 icon_prefix">Description</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s6 m6 l4 offset-m1 offset-l1 tooltipped" data-position="right"
                             data-delay="50"
                             data-tooltip="What type of event is it?">
                            <select name="event_categories[]" class="icons" multiple>
                                <option value="" disabled selected>Categories</option>
                                <?php foreach ($data['category'] as $category) {
                                    ?>
                                    <option value="<?= $category['idCategorie']; ?>"
                                            class="left circle"><?= $category['nameCategorie']; ?></option>
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

                    <div class="row blued tooltipped" data-position="right" data-delay="50"
                         data-tooltip="Did you already create an event on an other site?">
                        <p class="margin_left blued">Add social network</p>

                        <div class="secure_hover_picto">
                            <a class="fb_click">
                                <div class=" event_picto_soc event_fb"></div>
                            </a>

                            <a class="ins_click clear">
                                <div class="event_picto_soc event_ins"></div>
                            </a>

                            <a class="yout_click">
                                <div class="event_picto_soc event_yout"></div>
                            </a>

                            <a class="tw_click">
                                <div class="event_picto_soc event_tw"></div>
                            </a>

                            <div class="input-field col s12 l12 m12 secure_margin none field_fb">
                                <input name="facebook"
                                       type="text"
                                       value="<?php if (!empty($data['event']['facebookEvent'])) {
                                            echo $data['event']['facebookEvent'];
                                        } ?>">
                                <label for="facebook">Event Facebook url</label>
                            </div>

                            <div class="input-field col s12 l12 m12 secure_margin none field_ins">
                                <input name="instagram"
                                       type="text"
                                       value="<?php if (!empty($data['event']['instagramEvent'])) {
                                           echo $data['event']['instagramEvent'];
                                       } ?>">
                                <label for="instagram">Instagram url</label>
                            </div>

                            <div class="input-field col s12 l12 m12 secure_margin none field_yout">
                                <input name="youtube"
                                       type="text"
                                       value="<?php if (!empty($data['event']['youtubeEvent'])) {
                                           echo $data['event']['youtubeEvent'];
                                       } ?>">
                                <label for="youtube">Youtube url</label>
                            </div>

                            <div class="input-field col s12 l12 m12 secure_margin none field_tw">
                                <input name="twitter"
                                       type="text"
                                       value="<?php if (!empty($data['event']['twitterEvent'])) {
                                           echo $data['event']['twitterEvent'];
                                       } ?>">
                                <label for="twitter">Twitter url</label>
                            </div>

                        </div>

                    </div>

                    <div class="more_margin"></div>

                    <div class="row">
                        <div class="separateur_form valign-wrapper col l12 m12 s12">
                            <div class="bullet_point">
                                <p class="num_bullet_point">2</p>
                            </div>
                            <div>
                                <h3 class="text_separteur">Let's embellish your event</h3>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 l12 m12">
                            <input name="coverPicture"
                                   type="file"
                                   id="input-file-now"
                                   data-height="200"
                                   class="dropify tooltipped"
                                   data-tooltip="Choose a cover picture"
                                   data-delay="50"
                                   data-position="right"
                                   data-default-file="
                                   <?php if (!empty($data['event']['coverPicture'])) {
                                       echo "assets/img/events/uploads/" . $data['event']['coverPicture'];
                                   } else {
                                       echo "assets/img/couv_default.jpg";
                                   } ?>"/>

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
                                       data-default-file="assets/img/events/uploads/<?= $data['medias'][$i]['eventPicture']; ?>"/>
                                <?php } ?>

                                <input type="hidden" name="mediasSave[]"
                                       value="<?php if (!empty($data['medias'][$i])) { ?>
                                    <?= $data['medias'][$i]['eventPicture']; ?>
                                <?php } ?>"/>

                            </div>
                        <?php } ?>

                        <!--<div class="input-field col s3">
                          <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify"/>
                      </div>
                      <div class="input-field col s3">
                          <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify"/>
                      </div>
                    <div class="input-field col s3">
                          <input name="media[]" type="file" id="input-file-now" data-height="90"
                                 class="dropify tooltipped"
                                 data-tooltip="Choose media pictures"
                                 data-delay="50" data-position="right"/>
                      </div>-->
                    </div>
                    <!----II-2----->
                    <div class="more_margin"></div>
                    <div class="row">
                        <div class="separateur_form valign-wrapper col l12 m12 s12">
                            <div class="bullet_point">
                                <p class="num_bullet_point">3</p>
                            </div>
                            <div>
                                <h3 class="text_separteur">Volunteers needed !</h3>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($data['missions'])) { ?>
                        <?php foreach ($data['missions'] as $mission): ?>
                            <div id="first-mission-field" class="top-space tooltipped"
                                 data-delay="50" data-position="right"
                                 data-tooltip="What kind of missions for your volunteers?">
                                <div class="input-field col s9 secure-mission">
                                    <i class="material-icons prefix">perm_identity</i>
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
                                <i class="material-icons prefix">perm_identity</i>
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
                            <i class="material-icons prefix">perm_identity</i>
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
                    <div class="row btn_crea2">
                        <div class="right">
                            <?php if (isset($_SESSION['user_id'])) { ?>
                                <button name="save" class="btn btn-menu">Save</button>

                                <button name="submit" class="btn btn-orange"
                                        onclick="Materialize.toast('Published', 4000)">Publish
                                </button>
                            <?php } else { ?>
                                <a name="save" class="btn btn-menu modal-trigger" href="#login">Save</a>

                                <a name="submit" href="#login" class="btn btn-orange modal-trigger">Publish
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </form><!--//// END FOM ****/////--->
            </div> <!--content-->
        </div><!-- fin formulaire-->
    </div><!-- fin page event-->
<?php include_once('views/layout/footer.inc.php'); ?>