<?php include_once('layout/adminheader.inc.php'); ?>
<!-- Main Content -->
  <section class="content-wrap ecommerce-product-single">


<!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Event Name</h1>
        </div>
      </div>

    </div>
    <!-- /Breadcrumb -->

    <form action="">
      <!-- Save and Cancel buttons -->
      <p class="right-align">
        <button class="btn" type="submit">Save</button>
        <a class="btn" href="eventList">Cancel</a>
      </p>
      <!-- /Save and Cancel buttons -->

      <!-- General -->
      <div class="card">
        <div class="title">
          <h5>General Info</h5>
          <a class="minimize" href="#">
            <i class="mdi-navigation-expand-less"></i>
          </a>
        </div>
        <div class="content" style="overflow: visible">
          <!-- Product Name -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="ecommerce-product-name" class="setting-title">
                Event Name
              </label>
            </div>
            <div class="col s12 l9">
              <div class="input-field no-margin-top">
                <input id="ecommerce-product-name" type="text" placeholder="Event Name" value="" name="product-name">
              </div>
            </div>
          </div>
          <!-- /Product Name -->

          <!-- Product Photos -->
          <div class="row product-photos">
            <div class="col s12 l3">
              <label for="ecommerce-product-photos" class="setting-title">
                Event Photos
              </label>
            </div>
            <div class="col s12 l9">
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input id="ecommerce-product-photos" type="file" name="product-photos" />
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path" type="text" />
                </div>
              </div>
              <div class="photos">
                <div class="main-photo">
                  <img class="materialboxed" width="150" src="">
                </div>
                <div class="small-photo">
                  <img class="materialboxed" width="50" src="">
                  <img class="materialboxed" width="50" src="">
                  <img class="materialboxed" width="50" src="">
                  <img class="materialboxed" width="50" src="">
                  <img class="materialboxed" width="50" src="">
                  <img class="materialboxed" width="50" src="">
                </div>
              </div>
            </div>
          </div>
          <!-- /Product Photos -->


          <!-- Product Description -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label class="setting-title">
                Event Description
              </label>
            </div>
            <div class="col s12 l9">

              <textarea id="ckeditor1" name="product-description">
                <u>Small Description</u>
                <p><i>The Good</i>
                  <br>The iPhone 6 delivers a spacious, crisp 4.7-inch screen, improved wireless speeds, better camera autofocus, and bumped-up storage capacities to 128GB at the top end. iOS remains a top-notch mobile operating system with an excellent app
                  selection, and Apple Pay is a smooth, secure payment system.
                </p>
                <p><i>The Bad</i>
                  <br>Battery life isn't much better than last year's iPhone 5S. An even larger screen could have been squeezed into the same housing.
                </p>
                <p><i>The Bottom Line</i>
                  <br>The iPhone 6 is an exceptional phone in nearly every way except its average battery life: it's thin and fast with a spacious screen and the smoothest payment system we've seen. It's the best overall phone of 2014.
                </p>
              </textarea>

            </div>
          </div>
          <!-- /Product Description -->
        </div>
      </div>
      <!-- /General -->

      <!-- Details -->
      <div class="card">
        <div class="title">
          <h5>Details</h5>
          <a class="minimize" href="#">
            <i class="mdi-navigation-expand-less"></i>
          </a>
        </div>
        <div class="content">

          <!-- Location -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="location" class="setting-title">
                Location
              </label>
            </div>
            <div class="col s12 l9">
              <div class="input-field no-margin-top">
                <textarea name="product-keywords" id="location" placeholder="Event Location" class="materialize-textarea"></textarea>
              </div>
            </div>
          </div>
          <!-- /Location -->

          <!-- Start date -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="start date" class="setting-title">
                Start date
              </label>
            </div>
            <div class="col s12 l9">
              <div class="input-field no-margin-top">
                <input class="datepicker" id="input_end_date" type="date">
                <label for="input_end_date">Start date</label>
              </div>
            </div>
          </div>
          <!-- /Start date -->

          <!-- End date -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="end date" class="setting-title">
                End date
              </label>
            </div>
            <div class="col s12 l9">
              <div class="input-field no-margin-top">
                <input class="datepicker" id="input_end_date" type="date">
                <label for="input_end_date">End date</label>
              </div>
            </div>
          </div>
          <!-- /End date -->

          <!-- Start time -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="start time" class="setting-title">
                Start time
              </label>
            </div>
            <div class="col s12 l9">
              <div class="input-field col s6 m3">
                  <div class="select-wrapper">
                    <span class="caret">▼</span>
                    <ul id="select-options-e936197d-61df-0ed5-b873-b77e7ee28397" class="dropdown-content select-dropdown "><li class="disabled "><span>Hours</span></li><li class=""><span>00</span></li><li class=""><span>01</span></li><li class=""><span>02</span></li><li class=""><span>03</span></li><li class=""><span>04</span></li><li class=""><span>05</span></li><li class=""><span>06</span></li><li class=""><span>07</span></li><li class=""><span>08</span></li><li class=""><span>09</span></li><li class=""><span>10</span></li><li class=""><span>11</span></li><li class=""><span>12</span></li></ul><select name="event_hour_start" class="initialized">
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
                  <div class="select-wrapper"><span class="caret">▼</span><ul id="select-options-f7cad8ff-3bbd-94e9-c28d-4f8df21cc5ea" class="dropdown-content select-dropdown "><li class="disabled "><span>Minutes</span></li><li class=""><span>00</span></li><li class=""><span>05</span></li><li class=""><span>10</span></li><li class=""><span>15</span></li><li class=""><span>20</span></li><li class=""><span>25</span></li><li class=""><span>30</span></li><li class=""><span>35</span></li><li class=""><span>40</span></li><li class=""><span>45</span></li><li class=""><span>50</span></li><li class=""><span>55</span></li></ul><select name="event_min_start" class="initialized">
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
            </div>
          </div>
          <!-- /Start time -->

          <!-- End time -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="end time" class="setting-title">
                End time
              </label>
            </div>
              <div class="col s12 l9">
                <div class="input-field col s6 m3">
                    <div class="select-wrapper"><span class="caret">▼</span><ul id="select-options-e936197d-61df-0ed5-b873-b77e7ee28397" class="dropdown-content select-dropdown "><li class="disabled "><span>Hours</span></li><li class=""><span>00</span></li><li class=""><span>01</span></li><li class=""><span>02</span></li><li class=""><span>03</span></li><li class=""><span>04</span></li><li class=""><span>05</span></li><li class=""><span>06</span></li><li class=""><span>07</span></li><li class=""><span>08</span></li><li class=""><span>09</span></li><li class=""><span>10</span></li><li class=""><span>11</span></li><li class=""><span>12</span></li></ul><select name="event_hour_start" class="initialized">
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
                    <div class="select-wrapper"><span class="caret">▼</span><ul id="select-options-f7cad8ff-3bbd-94e9-c28d-4f8df21cc5ea" class="dropdown-content select-dropdown "><li class="disabled "><span>Minutes</span></li><li class=""><span>00</span></li><li class=""><span>05</span></li><li class=""><span>10</span></li><li class=""><span>15</span></li><li class=""><span>20</span></li><li class=""><span>25</span></li><li class=""><span>30</span></li><li class=""><span>35</span></li><li class=""><span>40</span></li><li class=""><span>45</span></li><li class=""><span>50</span></li><li class=""><span>55</span></li></ul><select name="event_min_start" class="initialized">
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
              </div>
            </div>
          <!-- /End time -->

          <!-- categories -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="categories" class="setting-title">
                Categories
              </label>
            </div>
            <div class="col s3 l3">
              <div class="select-wrapper icons"><span class="caret">▼</span>
                <ul class="dropdown-content select-dropdown multiple-select-dropdown active" >
                  <li class="disabled">
                    <span>
                      <input type="checkbox" disabled="">
                      <label>Categories</label>
                    </span>
                  </li>
                  <li class="">
                    <span>
                      <input type="checkbox">
                      <label>Festival</label>
                    </span>
                  </li>
                  <li class="">
                    <span>
                      <input type="checkbox">
                      <label>Rock</label>
                    </span>
                  </li>
                  <li class="">
                    <span>
                      <input type="checkbox">
                      <label>Pop</label>
                    </span>
                  </li>
                  <li class="">
                    <span>
                      <input type="checkbox">
                      <label>
                        Techno
                      </label>
                    </span>
                  </li>
                </ul>
                <select name="event_categories[]" class="icons initialized" multiple="">
                  <option value="" disabled="" selected="">Categories</option>
                  <option value="1" class="left circle">Festival</option>
                  <option value="2" class="left circle">Rock</option>
                  <option value="4" class="left circle">Pop</option>
                  <option value="5" class="left circle">Techno</option>
              </select>
            </div>
            </div>
          </div>
          <!-- /End time -->

        </div>
      </div>
      <!-- /Details -->

      <!-- Missions -->
      <div class="card">
        <div class="title">
          <h5>Missions</h5>
          <a class="minimize" href="#">
            <i class="mdi-navigation-expand-less"></i>
          </a>
        </div>
        <div class="content">

          <!-- Description -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="ecommerce-product-keywords" class="setting-title">
                Missions
              </label>
            </div>
            <div class="col s12 l9">
              <div class="input-field no-margin-top">

                <div id="first-mission-field" class="top-space">
                    <div class="input-field col s5 secure-mission">
                        <input name="missions[]" id="icon_prefix" placeholder="Barman" type="text" class="validate">
                        <label for="icon_prefix">Mission</label>
                    </div>
                      <div class="input-field col secure-mission">
                          <input name="nbVolunteer[]" placeholder="1" type="number" min="0" class="validate">
                          <label>Number</label>
                      </div>
                </div>

                <div id="mission-field" class="mission hide">
                    <div class="input-field col s5 secure-mission">
                        <input name="missions[]" id="icon_prefix" placeholder="Barman" type="text" class="validate">
                        <label for="icon_prefix">Mission</label>
                    </div>
                      <div class="input-field col secure-mission">
                          <input name="nbVolunteer[]" placeholder="1" type="number" min="0" class="validate">
                          <label>Number</label>
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
          <!-- /Description -->

        </div>
      </div>
      <!-- /Missions -->

      <!-- Meta -->
      <div class="card">
        <div class="title">
          <h5>Meta</h5>
          <a class="minimize" href="#">
            <i class="mdi-navigation-expand-less"></i>
          </a>
        </div>
        <div class="content">

          <!-- Description -->
          <div class="row no-margin-top">
            <div class="col s12 l3">
              <label for="ecommerce-product-keywords" class="setting-title">
                Meta Description
              </label>
            </div>
            <div class="col s12 l9">
              <div class="input-field no-margin-top">
                <textarea name="product-keywords" id="ecommerce-product-keywords" placeholder="Event meta description" class="materialize-textarea"></textarea>
              </div>
            </div>
          </div>
          <!-- /Description -->

        </div>
      </div>
      <!-- /Meta -->

      <!-- Save and Cancel buttons -->
      <p class="right-align">
        <button class="btn" type="submit">Save</button>
        <a class="btn" href="ecommerce-products.html">Cancel</a>
      </p>
      <!-- /Save and Cancel buttons -->
    </form>

  </section>
  <!-- /Main Content -->
<?php include_once('layout/adminfooter.inc.php'); ?>