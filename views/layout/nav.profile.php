<div class="card noborder">
    <div class="card panel colbg noborder center">
        <div class="panel-text">
            <?php if (isset($data['user']['Picture'])) { ?>
                <img class="resposive-img circle" src="assets/img/user_pp/<?php echo $data['user']['Picture']; ?>" width="100"
                     height="100">
            <?php } else { ?>
                <img class="resposive-img circle" src="assets/img/square_face.png" width="100"
                     height="100">
            <?php } ?>
            <h2 class="name-profile nospace"><?php if(isset($data['user']['FirstName'])) { echo $data['user']['FirstName']; }  ?></h2>
            <a href="profile/show/<?= $_SESSION['user_id']; ?>">See profile as public</a><br/>
        </div>
    </div>
</div>
<a class='hide-on-large-only dropdown-button btn btn-block' href='#'
   data-activates='dropdown1'>Menu</a>
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="profile/dashboard"><i class="material-icons">view_list</i>Dashboard</a></li>
    <li><a href="profile/missions"><i class="material-icons">work</i>My missions</a></li>
    <li><a href="profile/events"><i class="material-icons">grade</i>My events</a></li>
    <li><a href="profile/home"><i class="material-icons">perm_identity</i>Edit my profile</a></li>
    <li class="borderbotitem"><a href="help/home"><i class="material-icons">settings</i>Help center</a></li>
</ul>

<ul class="left-nav hide-on-med-and-down">
    <li><a href="profile/dashboard"><i class="material-icons">view_list</i>Dashboard</a></li>
    <li><a href="profile/missions"><i class="material-icons">work</i>My missions</a></li>
    <li><a href="profile/events"><i class="material-icons">grade</i>My events</a></li>
    <li><a href="profile/home"><i class="material-icons">perm_identity</i>Edit my profile</a></li>
    <li class="borderbotitem"><a href="help/home"><i class="material-icons">settings</i>Help center</a></li>
</ul>