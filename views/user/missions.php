<?php include_once('views/layout/header.inc.php'); ?>

<div class="container">
            <div class="page-content">
                <div class="row margtop100">
                    <div class="col l3 m12 s12 colbg nopadding">
                        
                   
                        
                        

                        <div class="card noborder">
                        <div class="card panel colbg noborder center">
                            <div class="panel-text">
                            <img class="resposive-img circle" src="assets/img/square_face.png" width="100" height="100">
                            <h2 class="name-profile nospace">Salim</h2>
                            <a href="profilepublic.php">See profile as public</a><br/>
                            </div>
                        </div>
                        </div>
                        
                         <a class='hide-on-large-only dropdown-button btn btn-block' href='#' data-activates='dropdown1'>Menu</a>
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="dashboard.php"><i class="material-icons">view_list</i>Dashboard</a></li>
                            <li><a href="mymissions.php"><i class="material-icons">work</i>My missions</a></li>
                            <li><a href="myevents.php"><i class="material-icons">event_available</i>My events</a></li>
                            <li><a href="profile.php"><i class="material-icons">perm_identity</i>Edit my profile</a></li> 
                            </li>
                        </ul>
                        
                        
                        <ul class="left-nav hide-on-med-and-down">
                        <li><a href="dashboard.php"><i class="material-icons">view_list</i>Dashboard</a></li>
                            <li><a href="mymissions.php"><i class="material-icons">work</i>My missions</a></li>
                            <li><a href="myevents.php"><i class="material-icons">event_available</i>My events</a></li>
                            <li><a href="profile.php"><i class="material-icons">perm_identity</i>Edit my profile</a></li>
                        </ul>
                        
                        
                        

                    </div>
                    
                    <div class="col l9 m12 s12">
                        
                            <div class="row">
                                <div class="col s12">
                                <ul class="tabs">
        <li class="tab col s6"><a class="active" href="#test4">Upcoming missions</a></li>
        <li class="tab col s6"><a href="#test5">Missions done</a></li>
        
     
                                </ul>
                            
                            </div>
                            
                            </div><!-- fin row-->
     
                            
                                <table id="test4" class="striped responsive-table table-missions">
        <thead>
          <tr>
              <th data-field="id">Date<i class="tiny material-icons right rotate">play_arrow</i></th>
              <th data-field="name">Event</th>
              <th data-field="price">Mission</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>13/01/2015</td>
            <td>La Dynamiterie</td>
            <td>Bar</td>
          </tr>
            
        <tr>
            <td>13/01/2015</td>
            <td>La Dynamiterie</td>
            <td>Bar</td>
          </tr>
            
        <tr>
            <td>13/01/2015</td>
            <td>La Dynamiterie</td>
            <td>Bar</td>
          </tr>
            
        <tr>
            <td>13/01/2015</td>
            <td>La Dynamiterie</td>
            <td>Bar</td>
          </tr>
          
        </tbody>
      </table>
                        
                        
                        
        <table id="test5" class="striped responsive-table table-missions">
        <thead>
          <tr>
              <th data-field="id">Date<i class="tiny material-icons right rotate">play_arrow</i></th>
              <th data-field="name">Event</th>
              <th data-field="price">Mission</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>13/01/2015</td>
            <td>La Dynamiterie</td>
            <td>Bar</td>
          </tr>
            
        <tr>
            <td>13/01/2015</td>
            <td>La Dynamiterie</td>
            <td>Bar</td>
          </tr>
            
      
          
        </tbody>
      </table>
                            
                    </div><!-- fin col-->
                </div><!-- fin row-->
            </div>
        </div>



 <?php include_once('views/layout/footer.inc.php'); ?>