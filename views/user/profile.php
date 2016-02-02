<?php include_once('views/layout/header.inc.php'); ?>

    <div class="container">
        <div class="page-content">
            <div class="row margtop100">
                <form class="formedit-profile" action="?module=profile&action=edit" method="post" enctype="multipart/form-data">
                    <div class="col l3 m12 s12 colbg nopadding">
                        <!--<div class="card">
                    <?php if (isset($data['Picture'])) { ?>
                    <div class="card-image">
                        <img class="responsive-img" src="assets/img/user_pp/<?php echo $data['Picture'] ?>">
                        <input type="hidden" value="<?php echo $data['Picture'] ?>" name="userPictureSaved">
                        <input type="file" name="userPicture" class="upload">
                    </div>
                    <?php } else { ?>
                    <div class="upload-profile-pic btn btn-block">
                        <input name="userPicture" type="file" id="input-file-now" data-height="250" class="dropify"/>
                    </div>
                    <?php } ?>
                </div>-->
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
                                    <li class="tab col s4"><a class="active" href="#required">Required information</a>
                                    </li>
                                    <li class="tab col s4"><a href="#optional">Optional</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card panel" id="required">
                            <div class="panel-text">
                                <div class="row">
                                    <div class="col l6 s12">
                                        <div class="input-field">
                                            <input id="first_name" type="text" class="validate" name="first_name" value="<?php echo $data['FirstName']; ?>">
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>

                                    <div class="col l6 s12">
                                        <div class="input-field">
                                            <input id="last_name" type="text" class="validate" name="last_name" value="<?php echo $data['LastName']; ?>">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s9 m9">
                                        <label for="user-birthdate">
                                            Date of birth
                                        </label><br/>

                                        <div class="select">
                                            <select class="browser-default" name="birth_day">
                                                <option value="" disabled selected>Day</option>
                                                <?php for ($d = 1; $d <= 31; $d++) { ?>
                                                    <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="select">
                                            <select class="browser-default" name="birth_month">
                                                <option value="" disabled selected>Month</option>
                                                <?php for ($m = 1; $m <= 12; $m++) { ?>
                                                    <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="select">
                                            <select class="browser-default" name="birth_year">
                                                <option value="" disabled selected>Year</option>
                                                <?php for ($m = 1950; $m <= 2015; $m++) { ?>
                                                    <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if (isset($data['BirthDate'])) { ?>
                                        <div class="input-field col s1">
                                            <p>
                                                <?php echo $data['BirthDate']; ?>
                                            </p>
                                            <input type="hidden" name="BirthDateSaved"
                                                   value="<?php echo $data['BirthDate']; ?>">
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="row">
                                    <div class="col l12 s12">
                                        <div class="input-field">
                                            <input placeholder="Please enter a valid email adress" id="email"
                                                   type="email" class="validate" value="<?php echo $data['Email']; ?>"
                                                   name="email">
                                            <label for="email">Email adress</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col l12 s12">
                                        <div class="input-field">
                                            <input placeholder="Example : Paris, France" id="location" type="text"
                                                   class="validate" name="location"
                                                   value="<?php echo $data['Location']; ?>">
                                            <label for="last_name">Where you live</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12">
                                        <div class="input-field">
                                            <textarea id="icon_prefix2" class="materialize-textarea" name="description">
                                                <?php echo $data['Description']; ?>
                                            </textarea>
                                            <label for="icon_prefix2">Describe yourself in some words</label>

                                            <div class="text-description grey-text">
                                                Volunteers is built on relationships. Help other people get to know
                                                you<br/><br/>
                                                Tell them about the things you like : what are your passions ?<br/><br/>
                                                Tell them what is your favourite work as a volunteer, or what could it
                                                be ?<br/><br/>
                                                Tell them about you : do you have a life motto ?
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12">
                                        <div class="input-field">
                                            <textarea id="icon_prefix2" class="materialize-textarea"
                                                      name="skills"><?php echo $data['Skills']; ?></textarea>
                                            <label for="icon_prefix2">What are your skills ?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- fin card panel-->

                        <div class="card panel" id="optional">
                            <div class="panel-text">
                                <div class="row">
                                    <div class="col l6 s12">
                                        <div class="input-field">
                                            <input id="school" type="text" class="validate" name="school"
                                                   value="<?php echo $data['School']; ?>">
                                            <label for="school">School</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col l6 s12">
                                        <div class="input-field">
                                            <input placeholder="Apple/Carrefour" id="work" type="text" class="validate"
                                                   name="work" value="<?php echo $data['Work']; ?>">
                                            <label for="work">Work</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <blockquote>
                                            <a href="?module=password&action=change" class="blue-text" title="">Change
                                                my password</a>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <blockquote>
                                            <a href="?module=profile&action=delete" class="red-text" title="">Delete my
                                                account :(</a>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div><!-- fin card panel-->
                        <button type="submit" class="btn btn-orange">Save</button>
                    </div>
                </form>
            </div>
        </div><!-- fin page content-->
    </div><!-- fin container-->

<?php include_once('views/layout/footer.inc.php'); ?>