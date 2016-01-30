<?php include_once('layout/adminheader.inc.php'); ?>
<!-- Main Content -->
  <section class="content-wrap">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Register</h1>
      </div>

    </div>
    <!-- /Breadcrumb -->

<form action="#!">
    </div>
      <div class="row">
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
                <div class="container">
                    <div class="row">
                        <div class="col l6 s12">
                            <div class="input-field">
                              <i class="fa fa-user prefix"></i>
                                <input id="first_name" type="text" class="validate" name="first_name" value="<?php echo $data['FirstName']; ?>">
                                <label for="first_name">First Name</label>
                            </div>
                        </div>

                        <div class="col l6 s12">
                            <div class="input-field">
                              <i class="fa fa-user prefix"></i>
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
                                <select class="browser-default col s3" name="birth_day">
                                    <option value="" disabled selected>Day</option>
                                    <?php for ($d = 1; $d <= 31; $d++) { ?>
                                        <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="select">
                                <select class="browser-default col s3" name="birth_month">
                                    <option value="" disabled selected>Month</option>
                                    <?php for ($m = 1; $m <= 12; $m++) { ?>
                                        <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="select">
                                <select class="browser-default col s3" name="birth_year">
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
                              <i class="fa fa-envelope prefix"></i>
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
                              <i class="fa fa-unlock-alt prefix"></i>
                                <input placeholder="Password" id="password"
                                       type="password" class="validate" value="<?php echo $data['Password']; ?>"
                                       name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l12 s12">
                            <div class="input-field">
                                <input placeholder="Example : Paris, France" id="location" type="text"
                                       class="validate" name="location"
                                       value="<?php echo $data['Location']; ?>">
                                <label for="last_name">Where s/he lives</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <div class="input-field">
                                <textarea id="icon_prefix2" class="materialize-textarea" name="description"><?php echo $data['Description']; ?></textarea>
                                <label for="icon_prefix2">Description</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <div class="input-field">
                                <textarea id="icon_prefix2" class="materialize-textarea"
                                          name="skills"><?php echo $data['Skills']; ?></textarea>
                                <label for="icon_prefix2">Skills</label>
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
          </div>
        </div>
        <div class="row">
        <button type="submit" class="btn btn-orange">Save</button>
        </div>

        </form>

  </section>
  <!-- /Main Content -->
<?php include_once('layout/adminfooter.inc.php'); ?>