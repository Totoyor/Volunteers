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
        <li class="tab col s6"><a class="active" href="#saved">Saved events</a></li>
        <li class="tab col s6"><a href="#published">Published events</a></li>
       
        
     
                                </ul>
                            
                            </div>
                            
                            </div><!-- fin row-->
     
             
                            <div id="saved">
                                <div class="card panel panel2 space1">
                                <div class="upcoming-event">
                                    <div class="eventsprofile">
                                        <div class="row valign-wrapper margin-cat-bottom">
                                            <div class="hide-on-small-only col l3 m3 s3">
                                                <a href="#"><img src="assets/img/event1.png" class="responsive-img"></a>
                                            </div>
                                            
                                            <div class="col l6 s6">
                                                <a href="#"><h5 class="blue-title">La Dynamiterie</h5></a>
                                    <h6>Studio Albatros, Montreuil</h6>
                                    
                                    
                                    <p><i class="material-icons">schedule</i>21 Nov. 2015</p>
                                            </div>
                                            
                                            <div class="col l3 m3 s6">
                                            <a href="#" class="space3 btn btn-orange fullwidth"><i class="material-icons">create</i>Edit</a>
                                            <a href="#" class="btn btn-red fullwidth space3"><i class="material-icons">delete</i>Delete</a>
                                                <a href="#" class="btn btn-block fullwidth"><i class="material-icons">people</i>Volunteers</a>
                                            </div>
                                        
                                        </div>
 
                                    
                                    
                                    </div>        
                                </div>
                                </div>
                                
                          
                            </div><!-- fin onglet1-->
                                
                            
                    </div><!-- fin col-->
                </div><!-- fin row-->
            </div>
        </div>
         <?php include_once('views/layout/footer.inc.php'); ?>