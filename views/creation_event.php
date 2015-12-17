<?php include_once('views/layout/header.inc.php'); ?>
    <div class="row creabody">
        <div class="page_event col m10 s12 l7">
            <div class="formulaire_crea col l10 offset-l1">
                <div class="row">
                    <div class="col offset-m1 offset-l1 s12 m12 l12 center">
                        <h1 class="title-section left bleu">Ready to find volunteers ?</h1>
                    </div>
                    <p class="col m10 offset-m1">
                        Aliqua instituendarum appellat elit singulis. Officia ipsum voluptate a
                        excepteur a proident, si malis malis varias mandaremus, minim iis admodum ut
                        esse, admodum enim ubi nostrud comprehenderit.
                    </p>
                </div>

                <!-----/****FORMS****/---->
                <form method="post" action="event/create" class="col s12">

                    <div class="row btn_crea1">
                        <div class="col m6 s6 offset-m1">
                            <p class="right grisc saveyour">You can save your draft at anytime</p>
                        </div>
                        <div class="col m1 s2 center">
                            <a href="#" class="btn btn-menu" onclick="Materialize.toast('Saved', 4000)">Save</a>
                        </div>
                        <div class="col s3 m3 l2 center offset-s1 offset-m1 offset-l1">
                            <a href="#" class="btn btn-orange"
                               onclick="Materialize.toast('Published', 4000)">Publish</a>
                        </div>
                    </div>

                    <div class="row"></div>

                    <!----I-1----->
                    <div class="row">
                        <div class="separateur_form valign-wrapper offset-m1 offset-l1 col l10 m10 s12">
                            <div class="bullet_point offset-m1 offset-l1">
                                <p class="num_bullet_point">1</p>
                            </div>
                            <div>
                                <h3 class="text_separteur">Let's describe your event !</h3>
                            </div>
                        </div>
                    </div>

                    <div class="input-field col s11 offset-m1 offset-l1 col l10 m10">
                        <input name="event_name" class="tooltipped validate" data-position="right" data-delay="50"
                               data-tooltip="Show me what you've got !" id="icon_prefix" type="text" required>
                        <label for="icon_prefix">Event Name</label>
                    </div>

                    <div class="row">
                        <div class="input-field col s11 offset-m1 offset-l1 col l10 m10">
                            <i class="material-icons prefix">location_on</i>
                            <input name="event_location" id="icon_prefix" type="text" class="tooltipped validate" data-position="right"
                                   data-delay="50" data-tooltip="Where is your event ?" required>
                            <label for="icon_prefix">Location</label>
                        </div>
                    </div>

                    <div class="row tooltipped" data-position="right" data-delay="50" data-tooltip="What day is it?">
                        <div class="input-field col s8 offset-m1 offset-l1 col l6 m6">
                            <i class="material-icons prefix">today</i>
                            <input name="event_start" id="icon_prefix" type="date" placeholder="Click here to choose the begining"
                                   class="validate datepicker" required>
                            <label for="icon_prefix"></label>
                        </div>
                        <div class="col s4 l4 m4">
                            <p><a class="showend">+ End time</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s8 offset-m1 offset-l1 col l6 m6 newdate">
                            <i class="material-icons prefix">today</i>
                            <input name="event_end" id="icon_prefix" type="date" placeholder="Click here to choose the ending"
                                   class="datepicker" required>
                            <label for="icon_prefix"></label>
                        </div>
                    </div>


                    <div class="row tooltipped" data-position="right" data-delay="50" data-tooltip="When?">
                        <div class="input-field col s6 m2 offset-m1">
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

                        <div class="input-field col s6 m2">
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

                        <div class="input-field col s6 m2 offset-m2">
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

                        <div class="input-field col s6 m2">
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
                    </div>

                    <div class="row tooltipped" data-position="right" data-delay="50"
                         data-tooltip="How awesome is your event ?">
                        <div class="input-field col s10 offset-m1 offset-l1 col l10 m10">
                            <textarea name="event_description" id="textarea1 icon_prefix" class="materialize-textarea"></textarea>
                            <label for="textarea1 icon_prefix">Description</label>
                        </div>
                    </div>

                    <div class="row tooltipped" data-position="right" data-delay="50"
                         data-tooltip="What type of event is it?">
                        <div class="input-field col s8 m6 l5 offset-m1 offset-l1">
                            <select name="event_categories[]" class="icons" multiple>
                                <option value="" disabled selected>Categories</option>
                                <?php foreach ($data as $category) {
                                    ?>
                                    <option value="<?= $category['idCategorie']; ?>" data-icon="assets/img/hiphop.png"
                                            class="left circle"><?= $category['nameCategorie']; ?></option>
                                    <?php
                                } ?>
                            </select>
                            <label>Choose your categories</label>
                        </div>
                    </div>

                    <!----II-2----->
                    <div class="row">
                        <div class="separateur_form valign-wrapper offset-m1 offset-l1 col l10 m10 s12">
                            <div class="bullet_point">
                                <p class="num_bullet_point">
                                    2
                                </p>
                            </div>
                            <div>
                                <h2 class="text_separteur col m12 offset-m4">Volunteers needed<h2/>
                            </div>
                        </div>
                    </div>

                    <div id="first-mission-field" class="row tooltipped mission" data-position="right" data-delay="50"
                         data-tooltip="What kind of missions for your volunteers?">
                        <div class="input-field col s8 secure-mission offset-m1">
                            <input name="missions[]" id="icon_prefix" placeholder="Barman" type="text" class="validate">
                            <label for="icon_prefix">Mission</label>
                        </div>
                        <div class="input-field col s2 secure_nb_vol">
                            <div class="input-field col s8 secure-mission offset-m1">
                                <input name="nbVolunteer[]" placeholder="1" type="number" class="validate">
                                <label>Number</label>
                            </div>
                        </div>
                    </div>

                    <div id="mission-field" class="row tooltipped mission hide" data-position="right" data-delay="50"
                         data-tooltip="What kind of missions for your volunteers?">
                        <div class="input-field col s8 secure-mission offset-m1">
                            <input name="missions[]" id="icon_prefix" placeholder="Barman" type="text" class="validate">
                            <label for="icon_prefix">Mission</label>
                        </div>
                        <div class="input-field col s2 secure_nb_vol">
                            <div class="input-field col s8 secure-mission offset-m1">
                                <input name="nbVolunteer[]" placeholder="1" type="number" class="validate">
                                <label>Number</label>
                            </div>
                        </div>
                    </div>
                    <div id="new-mission"></div>

                    <div class="row">
                        <div class="offset-l1 offset-m1 col m3  center">
                            <a class="btn btn-bleu addmiss">+ Add </a>
                        </div>
                    </div>

                    <div class="row btn_crea1">
                        <div class="offset-m7 offset-s6 col m1 s2 center">
                            <!--<a href="#" class="btn btn-menu" onclick="Materialize.toast('Saved', 4000)">Save</a>-->
                            <button name="save" onclick="Materialize.toast('Saved', 4000)" type="submit" class="btn btn-menu">Save
                            </button>
                        </div>
                        <div class="col s3 m3 l2 center offset-s1 offset-m1 offset-l1">
                            <!--<a href="#" class="btn btn-orange"
                               onclick="Materialize.toast('Published', 4000)">Publish</a>-->
                            <button name="submit" onclick="Materialize.toast('Published', 4000)" type="submit" class="btn btn-orange">
                                Publish
                            </button>
                        </div>
                    </div>

                </form><!--//// END FOM ****/////--->

            </div> <!--content-->
        </div><!-- fin formulaire-->
    </div><!-- fin page event-->
<?php include_once('views/layout/footer.inc.php'); ?>