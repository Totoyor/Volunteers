<?php include_once('views/layout/header.inc.php'); ?>
    <!-----/****FORMS****/---->
    <form method="post" action="event/create" enctype="multipart/form-data">
        <div class="row creabody">
            <div class="page_event col m10 s12 l8">
                <div class="formulaire_crea col l12">
                    <div class="row">
                        <div class="center">
                            <h1 class="title-section center"><strong>Ready to find volunteers ?</strong></h1>
                            <hr class="fancy-hr">
                        </div>
                        <p>
                            <?php if (!isset($_SESSION['user_id'])) { ?>
                                <script type='text/javascript' src='assets/js/notie.js'></script>
                                <script>notie.alert(2, 'Please log in before creating an event!', 4);</script>
                            <?php } ?>
                        </p>
                    </div>

                    <div class="row btn_crea1">
                        <div class="right">
                            <?php if (isset($_SESSION['user_id'])) { ?>
                                <button type="submit" name="save" class="btn btn-menu">Save</button>

                                <button type="submit" name="submit" class="btn btn-orange">Publish
                                </button>
                            <?php } else { ?>
                                <button type="submit" name="save" class="btn btn-menu" disabled>Save</button>

                                <button type="submit" name="submit" class="btn btn-orange" disabled>Publish
                                </button>
                            <?php } ?>

                        </div>
                    </div>


                    <div class="row"></div>

                    <!--I-1-->
                    <div class="row">
                        <div class="separateur_form valign-wrapper col l12 m12 s12">
                            <div class="bullet_point">
                                <p class="num_bullet_point">1</p>
                            </div>
                            <div>
                                <h3 class="text_separteur">Let's describe your event!</h3>
                            </div>
                        </div>
                    </div>


                    <div class="input-field col s12 l12 m12">
                        <input name="event_name" data-position="right" data-delay="50"
                               data-tooltip="What is the name of your event ?" class="tooltipped" type="text" required>
                        <label for="icon_prefix">Event Name</label>
                    </div>


                    <div class="row">
                        <div class="input-field col s12 col l12 m12">

                            <input name="event_location" id="icon_prefix" type="text" class="tooltipped validate"
                                   data-position="right" data-delay="50" data-tooltip="Where is your event ?">
                            <label for="icon_prefix">Location</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s9 l10 m9">
                            <i class="material-icons prefix">today</i>

                            <input data-position="right" data-delay="50" data-tooltip="What day is it?"
                                   name="event_start" id="icon_prefix" type="date"
                                   placeholder="Click here to choose the begining"
                                   class="validate datepicker tooltipped">

                            <label for="icon_prefix"></label>
                        </div>
                        <div class="col s3 l3 m3">
                            <p><a class="showend">+ Add End Date</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s10 l10 m10 newdate">
                            <i class="material-icons prefix">today</i>

                            <input name="event_end" id="icon_prefix" type="date"
                                   placeholder="Click here to choose the ending" class="datepicker">
                            <label for="icon_prefix"></label>
                        </div>
                    </div>
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
                    </div>


                    <div class="row">
                        <div class="input-field col s6 m3 offset-m1">
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

                        <div class="input-field col s6 m3 tooltipped" data-position="right" data-delay="50"
                             data-tooltip="When?">
                            <select name="event_end_mode">
                                <option value="" disabled selected>AM - PM</option>
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                            </select>
                            <label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 l12 m12">
                                <textarea name="event_description" id="textarea1 icon_prefix"
                                          class="materialize-textarea tooltipped"
                                          data-tooltip="How awesome is your event ?" data-position="right"
                                          data-delay="50"></textarea>
                            <label for="textarea1 icon_prefix">Description</label>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="input-field col s6 m6 l4 offset-m1 offset-l1 tooltipped" data-position="right"
                             data-delay="50"
                             data-tooltip="What type of event is it?">
                            <select name="event_categories[]" class="icons" multiple>
                                <option value="" disabled selected>Categories</option>
                                <?php foreach ($data as $category) {
                                    ?>
                                    <option value="<?= $category['idCategorie']; ?>"
                                            class="left circle"><?= $category['nameCategorie']; ?></option>
                                    <?php
                                } ?>
                            </select>
                            <label>Choose your categories</label>
                        </div>
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
                                <input name="facebook" type="text">
                                <label for="facebook">Event Facebook url</label>
                            </div>

                            <div class="input-field col s12 l12 m12 secure_margin none field_ins">
                                <input name="instagram" type="text">
                                <label for="instagram">Instagram url</label>
                            </div>

                            <div class="input-field col s12 l12 m12 secure_margin none field_yout">
                                <input name="youtube" type="text">
                                <label for="youtube">Youtube url</label>
                            </div>

                            <div class="input-field col s12 l12 m12 secure_margin none field_tw">
                                <input name="twitter" type="text">
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

                    <div class="clear">
                        <p class="margin_left">
                            Let’s add a cover picture for your event ! A 1200 x 700 image is advise.
                        </p>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 l12 m12">
                            <input name="coverPicture" type="file" id="input-file-now" data-height="200"
                                   class="dropify tooltipped" data-tooltip="Choose a cover picture" data-delay="50"
                                   data-position="right"/>
                        </div>
                    </div>

                    <div class="clear">
                        <p class="margin_left">
                            Add photos to make your event more appealing !
                        </p>
                    </div>


                    <div class="row">
                        <div class="input-field col s3">
                            <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify"/>
                        </div>

                        <div class="input-field col s3">
                            <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify"/>
                        </div>
                        <div class="input-field col s3">
                            <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify"/>
                        </div>
                        <div class="input-field col s3">
                            <input name="media[]" type="file" id="input-file-now" data-height="90"
                                   class="dropify tooltipped" data-tooltip="Choose media pictures" data-delay="50"
                                   data-position="right"/>

                        </div>
                    </div>


                    <!--II-2-->
                    <div class="row">
                        <div class="more_margin"></div>
                        <div class="more_margin"></div>
                        <div class="separateur_form valign-wrapper col l12 m12 s12">
                            <div class="bullet_point">
                                <p class="num_bullet_point">3</p>
                            </div>
                            <div>
                                <h3 class="text_separteur">Volunteer positions you need</h3>
                            </div>
                        </div>
                    </div>

                    <div id="first-mission-field" class="top-space tooltipped" data-delay="50" data-position="right"
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

                    <div id="mission-field" class="tooltipped mission hide" data-position="right" data-delay="50"
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

                    <div id="new-mission"></div>

                    <div class="row">
                        <div class="left col">
                            <a class="btn btn-bleu addmiss">+ Add </a>
                        </div>
                    </div>



                    <div class="row btn_crea2">
                        <div class="right">
                            <?php if (isset($_SESSION['user_id'])) { ?>
                                <button type="submit" name="save" class="btn btn-menu">Save</button>

                                <button type="submit" name="submit" class="btn btn-orange">Publish
                                </button>
                            <?php } else { ?>
                                <button name="save" class="btn btn-menu modal-trigger " disabled><i
                                        class="material-icons">save</i>SAVE
                                </button>

                                <button name="submit" class="btn btn-orange modal-trigger" disabled><i
                                        class="material-icons">publish</i>Publish
                                </button>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <!--content-->
            </div>
            <!-- fin formulaire-->
        </div>
    </form>
    <!--//// END FOM ****/////-->
    <!-- fin page event-->
<?php include_once('views/layout/footer.inc.php'); ?>