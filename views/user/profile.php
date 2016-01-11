<?php include_once('views/layout/header.inc.php'); ?>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="title_404">Profile</h1>
            <h3>My profile</h3>
            <form class="col s12" action="?module=profile&action=edit" method="post">
                <div class="row">
                    <div class="col s12">
                        <img src="assets/img/blog/avatar.png" class="img-responsive col s2">
                        <div class="file-field input-field col s4">
                            <div class="btn">
                                <span>Change Pic</span>
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
                        <input id="first_name" type="text" class="validate" name="first_name" value="<?php echo $data['FirstName']; ?>">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="last_name" value="<?php echo $data['LastName']; ?>">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s1">
                        <select name="birth_day">
                            <option value="" disabled selected>Day</option>
                            <?php for ($d = 0; $d <= 31; $d++) { ?>
                                <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                            <?php  } ?>
                        </select>
                        <label>Birth Date</label>
                    </div>
                    <div class="input-field col s1">
                        <select name="birth_month">
                            <option value="" disabled selected>Month</option>
                            <?php for ($m = 0; $m <= 12; $m++) { ?>
                                <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                            <?php  } ?>
                        </select>
                        <label></label>
                    </div>
                    <div class="input-field col s1">
                        <select name="birth_year">
                            <option value="" disabled selected>Year</option>
                            <?php for ($m = 1950; $m <= 2015; $m++) { ?>
                                <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                            <?php  } ?>
                        </select>
                        <label></label>
                    </div>
                    <div class="input-field col s1">
                        <p>
                        <?php echo $data['BirthDate']; ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" type="email" class="validate" value="<?php echo $data['Email']; ?>" name="email">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="location" type="text" class="validate" name="location" value="<?php echo $data['Location']; ?>">
                        <label for="last_name">Location</label>
                    </div>
                </div>

                <div class="row">
                    <div class=" col s6">
                        <h3>Presentation</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="icon_prefix2" class="materialize-textarea" name="presentation"></textarea>
                        <label for="icon_prefix2">A little text about you.</label>
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
                        <textarea id="icon_prefix2" class="materialize-textarea" name="skills"></textarea>
                        <label for="icon_prefix2">What's your skills ?</label>
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