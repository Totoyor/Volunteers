<?php include_once('views/layout/adminheader.inc.php'); ?>
    <section class="content-wrap">
        <!-- Breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col s12 m9 l10">
                    <h1>Register user</h1>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        <div class="row">
            <div class="col s12 l12">
                <form method="post" action="signup">
                    <div class="input-field">
                        <i class="mdi-action-account-box prefix"></i>
                        <input name="email" id="input_email" type="email" class="validate" required>
                        <label for="input_email">Email</label>
                    </div>
                    <div class="input-field">
                        <i class="mdi-action-lock prefix"></i>
                        <input name="password" id="input_password" type="password" class="validate" required>
                        <label for="input_password">Password</label>
                    </div>
                    <div class="center-align">
                        <button class="btn" type="submit" name="action">
                            Register <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php include_once('views/layout/adminfooter.inc.php'); ?>