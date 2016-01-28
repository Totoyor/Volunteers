<?php include_once('views/layout/header.inc.php'); ?>
    <div class="row creabody">
        <div class="page_event col m10 s12 l8">
            <div class="formulaire_crea col l12">
                <div class="row">
                    <div class="center">
                        <h1 class="title-section center bleu">Edit your event</h1>
                    </div>
                    <p class="">
                        Aliqua instituendarum appellat elit singulis. Officia ipsum voluptate a
                        excepteur a proident, si malis malis varias mandaremus, minim iis admodum ut
                        esse, admodum enim ubi nostrud comprehenderit.
                    </p>
                </div>
                <div><?php var_dump($data); ?></div>
                <!-----/****FORMS****/---->
                <form method="post" action="event/create" class="" enctype="multipart/form-data">

                    <div class="row btn_crea1">
                        <div class="right">
                            <?php if(isset($_SESSION['user_id'])){ ?>
                                <button name="save" class="btn btn-menu">Save</button>

                                <button name="submit" href="#" class="btn btn-orange"
                                        onclick="Materialize.toast('Published', 4000)">Update
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
                               value="<?php if(!empty($data['event']['nameEvent'])){
                                   echo $data['event']['nameEvent'];
                               } ?>"
                               required>
                        <label for="icon_prefix">Event Name</label>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 col l12 m12">

                            <input name="event_location"
                                   id="icon_prefix"
                                   type="text"
                                   class="tooltipped validate"
                                   data-position="right"
                                   data-delay="50"
                                   data-tooltip="Where is your event ?"
                                   value="<?php if(!empty($data['event']['locationEvent'])){
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
                                   value="<?php if(!empty($data['event']['startEvent'])){
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
                                   value="<?php if(!empty($data['event']['endEvent'])){
                                       echo $data['event']['endEvent'];
                                   } ?>">
                            <label for="icon_prefix"></label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="time"
                                   value="<?php if(!empty($data['event']['eventHourStart'])){
                                       echo $data['event']['eventHourStart'];
                                   } ?>"
                                   name="enventHourStart">
                        </div>
                        <div class="input-field col s4 m4">
                            <select name="event_end_mode">
                                <option value="" disabled selected>AM - PM</option>
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="time"
                                   value="<?php if(!empty($data['event']['eventHourEnd'])){
                                       echo $data['event']['eventHourStart'];
                                   } ?>"
                                   name="eventHourEnd">
                        </div>
                        <div class="input-field col s4 m4">
                            <select name="event_end_mode">
                                <option value="" disabled selected>AM - PM</option>
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 l12 m12">
                            <textarea name="event_description" id="textarea1 icon_prefix"
                                      class="materialize-textarea tooltipped" data-tooltip="How awesome is your event ?"
                                      data-position="right" data-delay="50"></textarea>
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
                    </div>

                    <div class="row">
                        <div class="input-field col s12 l12 m12">
                            <input name="coverPicture" type="file" id="input-file-now" data-height="200" class="dropify tooltipped"
                                   data-tooltip="Choose a cover picture"
                                   data-delay="50" data-position="right"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s3">
                            <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify"/>
                        </div>
                        <div class="input-field col s3">
                            <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify" />
                        </div>
                        <div class="input-field col s3">
                            <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify" />
                        </div>
                        <div class="input-field col s3">
                            <input name="media[]" type="file" id="input-file-now" data-height="90" class="dropify tooltipped"
                                   data-tooltip="Choose media pictures"
                                   data-delay="50" data-position="right"/>
                        </div>
                    </div>

                    <!----II-2----->
                    <div class="row">
                        <div class="separateur_form valign-wrapper col l12 m12 s12">
                            <div class="bullet_point">
                                <p class="num_bullet_point">2</p>
                            </div>
                            <div>
                                <h3 class="text_separteur">Volunteers needed !</h3>
                            </div>
                        </div>
                    </div>

                    <div id="first-mission-field" class="top-space tooltipped"
                         data-delay="50" data-position="right"
                         data-tooltip="What kind of missions for your volunteers?">
                        <div class="input-field col s9 secure-mission">
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

                    <div id="mission-field" class="tooltipped mission hide" data-position="right" data-delay="50"
                         data-tooltip="What kind of missions for your volunteers?">
                        <div class="input-field col s9 secure-mission">
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
                            <?php if(isset($_SESSION['user_id'])){ ?>
                                <button name="save" class="btn btn-menu">Save</button>

                                <button name="submit" href="#" class="btn btn-orange"
                                        onclick="Materialize.toast('Published', 4000)">Update
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