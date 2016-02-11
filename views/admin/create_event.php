<?php include_once('views/layout/adminheader.inc.php'); ?>
    <!-- Main Content -->
    <section class="content-wrap">
        <!-- Breadcrumb -->
        <div class="page-title">

            <div class="row">
                <div class="col s12 m9 l10">
                    <h1>Create Event</h1>
                </div>
            </div>

        </div>
        <!-- /Breadcrumb -->
        <div class="row">
            <div class="col s12 l6">

                <div class="card-panel">
                    <form action="#!">

                        <div class="row">
                            <!-- First Name -->
                            <div class="col m6 s12">
                                <div class="input-field">
                                    <i class="fa fa-user prefix"></i>
                                    <input id="input_fname" type="text" name="first_name">
                                    <label for="input_fname">Event Name</label>
                                </div>
                            </div>
                            <!-- /First Name -->

                            <!-- Last Name -->
                            <div class="col m6 s12">
                                <div class="input-field">
                                    <i class="fa fa-user prefix"></i>
                                    <input id="input_lname" type="email" name="last_name">
                                    <label for="input_lname">Location</label>
                                </div>
                            </div>
                            <!-- /Last Name -->
                        </div>
                        <hr>
                        <!-- Date -->
                        <div class="input-field">
                            <input class="datepicker" id="input_start_date" type="date">
                            <label for="input_start_date">Start date</label>
                        </div>

                        <div class="input-field">
                            <input class="datepicker" id="input_end_date" type="date">
                            <label for="input_end_date">End date</label>
                        </div>
                        <!-- /Date -->
                        <div class="row">
                            <div class="input-field col s6 m3">
                                <div class="select-wrapper"><span class="caret">▼</span><input type="text"
                                                                                               class="select-dropdown"
                                                                                               readonly="true"
                                                                                               data-activates="select-options-e936197d-61df-0ed5-b873-b77e7ee28397"
                                                                                               value="Hours">
                                    <ul id="select-options-e936197d-61df-0ed5-b873-b77e7ee28397"
                                        class="dropdown-content select-dropdown ">
                                        <li class="disabled "><span>Hours</span></li>
                                        <li class=""><span>00</span></li>
                                        <li class=""><span>01</span></li>
                                        <li class=""><span>02</span></li>
                                        <li class=""><span>03</span></li>
                                        <li class=""><span>04</span></li>
                                        <li class=""><span>05</span></li>
                                        <li class=""><span>06</span></li>
                                        <li class=""><span>07</span></li>
                                        <li class=""><span>08</span></li>
                                        <li class=""><span>09</span></li>
                                        <li class=""><span>10</span></li>
                                        <li class=""><span>11</span></li>
                                        <li class=""><span>12</span></li>
                                    </ul>
                                    <select name="event_hour_start" class="initialized">
                                        <option value="" disabled="" selected="">Hours</option>
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
                                    </select></div>
                                <label>Starting</label>
                            </div>

                            <div class="input-field col s6 m3">
                                <div class="select-wrapper"><span class="caret">▼</span>
                                    <input type="text"
                                           class="select-dropdown"
                                           readonly="true"
                                           data-activates="select-options-f7cad8ff-3bbd-94e9-c28d-4f8df21cc5ea"
                                           value="Minutes">
                                    <ul id="select-options-f7cad8ff-3bbd-94e9-c28d-4f8df21cc5ea"
                                        class="dropdown-content select-dropdown ">
                                        <li class="disabled "><span>Minutes</span></li>
                                        <li class=""><span>00</span></li>
                                        <li class=""><span>05</span></li>
                                        <li class=""><span>10</span></li>
                                        <li class=""><span>15</span></li>
                                        <li class=""><span>20</span></li>
                                        <li class=""><span>25</span></li>
                                        <li class=""><span>30</span></li>
                                        <li class=""><span>35</span></li>
                                        <li class=""><span>40</span></li>
                                        <li class=""><span>45</span></li>
                                        <li class=""><span>50</span></li>
                                        <li class=""><span>55</span></li>
                                    </ul>
                                    <select name="event_min_start" class="initialized">
                                        <option value="" disabled="" selected="">Minutes</option>
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
                                    </select></div>
                                <label></label>
                            </div>

                            <div class="input-field col s6 m3 tooltipped" data-position="right" data-delay="50"
                                 data-tooltip="When?" data-tooltip-id="b09cad84-d74e-0740-d8bc-8ac600b4ab86">
                                <div class="select-wrapper"><span class="caret">▼</span><input type="text"
                                                                                               class="select-dropdown"
                                                                                               readonly="true"
                                                                                               data-activates="select-options-49274f35-9ae6-889e-1281-5f04f0cf2d15"
                                                                                               value="AM - PM">
                                    <ul id="select-options-49274f35-9ae6-889e-1281-5f04f0cf2d15"
                                        class="dropdown-content select-dropdown ">
                                        <li class="disabled "><span>AM - PM</span></li>
                                        <li class=""><span>AM</span></li>
                                        <li class=""><span>PM</span></li>
                                    </ul>
                                    <select name="event_start_mode" class="initialized">
                                        <option value="" disabled="" selected="">AM - PM</option>
                                        <option value="am">AM</option>
                                        <option value="pm">PM</option>
                                    </select></div>
                                <label></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6 m3 offset-m1">
                                <div class="select-wrapper"><span class="caret">▼</span><input type="text"
                                                                                               class="select-dropdown"
                                                                                               readonly="true"
                                                                                               data-activates="select-options-5f46207b-b110-7dcf-d9a8-98ccab8954e7"
                                                                                               value="Hours">
                                    <ul id="select-options-5f46207b-b110-7dcf-d9a8-98ccab8954e7"
                                        class="dropdown-content select-dropdown ">
                                        <li class="disabled "><span>Hours</span></li>
                                        <li class=""><span>00</span></li>
                                        <li class=""><span>01</span></li>
                                        <li class=""><span>02</span></li>
                                        <li class=""><span>03</span></li>
                                        <li class=""><span>04</span></li>
                                        <li class=""><span>05</span></li>
                                        <li class=""><span>06</span></li>
                                        <li class=""><span>07</span></li>
                                        <li class=""><span>08</span></li>
                                        <li class=""><span>09</span></li>
                                        <li class=""><span>10</span></li>
                                        <li class=""><span>11</span></li>
                                        <li class=""><span>12</span></li>
                                    </ul>
                                    <select name="event_hour_end" class="initialized">
                                        <option value="" disabled="" selected="">Hours</option>
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
                                    </select></div>
                                <label>Ending</label>
                            </div>

                            <div class="input-field col s6 m3">
                                <div class="select-wrapper"><span class="caret">▼</span><input type="text"
                                                                                               class="select-dropdown"
                                                                                               readonly="true"
                                                                                               data-activates="select-options-d473d2c5-a918-724c-132d-aac81736ec30"
                                                                                               value="Minutes">
                                    <ul id="select-options-d473d2c5-a918-724c-132d-aac81736ec30"
                                        class="dropdown-content select-dropdown ">
                                        <li class="disabled "><span>Minutes</span></li>
                                        <li class=""><span>00</span></li>
                                        <li class=""><span>05</span></li>
                                        <li class=""><span>10</span></li>
                                        <li class=""><span>15</span></li>
                                        <li class=""><span>20</span></li>
                                        <li class=""><span>25</span></li>
                                        <li class=""><span>30</span></li>
                                        <li class=""><span>35</span></li>
                                        <li class=""><span>40</span></li>
                                        <li class=""><span>45</span></li>
                                        <li class=""><span>50</span></li>
                                        <li class=""><span>55</span></li>
                                    </ul>
                                    <select name="event_min_end" class="initialized">
                                        <option value="" disabled="" selected="">Minutes</option>
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
                                    </select></div>
                                <label></label>
                            </div>

                            <div class="input-field col s6 m3 tooltipped" data-position="right" data-delay="50"
                                 data-tooltip="When?" data-tooltip-id="57c5c3d6-c219-729e-a94a-195408ab8272">
                                <div class="select-wrapper"><span class="caret">▼</span><input type="text"
                                                                                               class="select-dropdown"
                                                                                               readonly="true"
                                                                                               data-activates="select-options-a302d7d6-6ecc-9f09-ea59-33fe0b9df9c4"
                                                                                               value="AM - PM">
                                    <ul id="select-options-a302d7d6-6ecc-9f09-ea59-33fe0b9df9c4"
                                        class="dropdown-content select-dropdown ">
                                        <li class="disabled "><span>AM - PM</span></li>
                                        <li class=""><span>AM</span></li>
                                        <li class=""><span>PM</span></li>
                                    </ul>
                                    <select name="event_end_mode" class="initialized">
                                        <option value="" disabled="" selected="">AM - PM</option>
                                        <option value="am">AM</option>
                                        <option value="pm">PM</option>
                                    </select></div>
                                <label></label>
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="input-field">
                            <textarea id="textarea_additional" class="materialize-textarea"
                                      name="additional"></textarea>
                            <label for="textarea_additional">Description</label>
                        </div>
                        <!-- /Additional Info -->

                        <hr>

                        <!-- Payment Type -->
                        <div class="input-field col s6 m6 l4 offset-m1 offset-l1 tooltipped" data-position="right"
                             data-delay="50" data-tooltip="What type of event is it?">
                            <div class="select-wrapper icons"><span class="caret">▼</span><input type="text"
                                                                                                 class="select-dropdown active"
                                                                                                 readonly="true"
                                                                                                 value="Categories">

                                <select name="event_categories[]" class="icons initialized" multiple>
                                    <option value="" disabled="" selected="">Categories</option>
                                    <option value="1" class="left circle">Festival</option>
                                    <option value="2" class="left circle">Rock</option>
                                    <option value="4" class="left circle">Pop</option>
                                    <option value="5" class="left circle">Techno</option>
                                </select>
                            </div>
                            <label>Choose your categories</label>
                        </div>


                        <div class="row">
                            <div class="col">
                                <button class="waves-effect btn">Continue</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- /Main Content -->
<?php include_once('views/layout/adminfooter.inc.php'); ?>