<?php include_once('views/layout/header.inc.php'); ?>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="title_404">Profile</h1>
            <h3>My profile</h3>
            <form class="col s12">
                <div class="row">
                    <div class="col s12">
                        <img src="assets/img/blog/avatar.png" class="img-responsive col s2">
                        <div class="file-field input-field col s4">
                            <div class="btn">
                                <span>Changer image</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s1" >
                        <select>
                            <option value="" disabled selected>Day</option>
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
                        <label>Birth Date</label>
                    </div>
                    <div class="input-field col s1">
                        <select>
                            <option value="" disabled selected>Month</option>
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
                    <div class="input-field col s1">
                        <select>
                            <option value="" disabled selected>Year</option>
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
                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="location" type="text" class="validate">
                        <label for="last_name">Location</label>
                    </div>
                </div>
                <div class="row">
                    <div class=" col s6">
                        <h3>My skills</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                        <label for="icon_prefix2">My skills</label>
                    </div>
                </div>
                <div class="row btn_crea1">
                    <div class="col s6">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('views/layout/footer.inc.php'); ?>