<?php include_once('views/layout/header.inc.php'); ?>

    <div class="container content-blog">
        <div class="row">
            <div class="col s12 m12">
                <div class="card-panel">
                    <form action="?method=Event&amp;action=create" method="post">
                        <div class="card-image col s3 push-s4">
<!--                            <img src="assets/img/avatar.png" class="responsive-img circle">-->
                            <h5 class="card-title center-align">Créer un event</h5>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="event_name" type="text" class="validate" name="event_name" required>
                                    <label for="email">Event name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="event_location" type="text" class="validate" name="event_location" required>
                                    <label for="email">Location</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="event_start" type="date" class="datepicker" name="event_start" required>
                                    <label for="email">Start</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="event_hour_start" type="time" class="validate" name="event_hour_start" required>
<!--                                    <label for="email">Hour</label>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="event_end" type="date" class="datepicker" name="event_end" required>
                                    <label for="email">End</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="event_hour_end" type="time" class="validate" name="event_hour_end" required>
<!--                                    <label for="email">Hour</label>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="event_categories[]" required multiple>
                                        <option disabled selected>Choose your categories</option>
                                        <option value="techno">Techno</option>
                                        <option value="house">House</option>
                                        <option value="festival">Festival</option>
                                    </select>
                                    <label>Catégories</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="event_description" name="event_description" class="materialize-textarea" required></textarea>
                                    <label for="textarea1">Description</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-action center">
                            <input name="save" type="submit" value="Save">
                            <input name="submit" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>

<script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    $(document).ready(function() {
        $('select').material_select();
    });

    $('select').material_select('destroy');
</script>
