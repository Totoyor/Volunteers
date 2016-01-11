  <?php include_once('views/layout/header.inc.php'); ?>

  <body class="grey lighten-4">
        
    <div class="page-content">
        <div class="row margtop100">
            <div class="col s9 right">
              <div class="row">
                <div class="col s10">
              <form method="get" action="/search" id="search-event">
                <input type="text" placeholder="Search for events.." id="event-search"/>
              </form>
              </div>
              <div class="col s2">
              <a class="btn btn-vue-bis" href="#">Search</a>
               </div>
              </div>
                <hr class="fancy-hr">
            </div>
        </div>

    <div class="row">
      <div class="col m3 l3">
        <div class="filter">
          <form method="get" action="/search" id="search">
            <input type="text" placeholder="Location" id="location-search" class="no-border-input"/>
          </form>
            <div class="chip">
              Hip-Hop
              <i class="material-icons">close</i>
            </div>
          <ul class="collapsible" data-collapsible="expandable">
            <li>
              <div class="collapsible-header active"><i class="material-icons">label</i>Category</div>
              <div class="collapsible-body decal">
                <ul>
                  <li><a href="">Hip-Hop</a></li>
                  <li><a href="">Techno</a></li>
                  <li><a href="">Pop/Rock</a></li>
                  <li><a href="">Festival</a></li>
                  <li><a href="">Party</a></li>
                </ul>
              </div>
            </li>
            <li>
              <div class="collapsible-header active"><i class="material-icons">schedule</i>Date</div>
              <div class="collapsible-body decal">
                <ul>
                  <li><a href="">Next week</a></li>
                  <li><a href="">Next month</a></li>
                  <li><a href="">Next 2 months</a></li>
                  <li><a href="">Next semester</a></li>
                  <li><a href="">Custom Date</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>

      </div>
      <div class="col s12 m9 l9 right">
        

        <div class="row">
            <div class="col s12 m6 l4">
                <div class="card small event popevent left">
                    <div class="card-image">
                      <img class="responsive-img" src="assets/img/event3.png" alt="image-event">
                    </div>
                    <div class="card-content">
                        <h4 class="titre-cards truncate">Blocaus</h4>
                        <h6 class="truncate">La Machine du Moulin Rouge, Paris - 21 Nov</h6>
                    </div>
                    <div class="card-action">
                        <a href="#">Party</a>
                        <a class="viewmore btn btn-vue" href="#">See more</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card small event popevent left">
                    <div class="card-image">
                      <img class="responsive-img" alt="image-event" src="assets/img/event4.png">
                    </div>
                    <div class="card-content">
                        <h4 class="titre-cards">Château Perché</h4>
                        <h6 class="truncate">Le Petit Bain, Paris - 21 Nov</h6>
                    </div>
                    <div class="card-action">
                        <a href="#">Techno</a>
                        <a class="viewmore btn btn-vue" href="#">See more</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card small event popevent left">
                    <div class="card-image">
                      <img class="responsive-img" alt="image-event" src="assets/img/event5.png">
                    </div>
                    <div class="card-content">
                        <h4 class="titre-cards">Lunar II</h4>
                        <h6 class="truncate">Le Gibus, Paris - 21 Nov</h6>
                    </div>
                    <div class="card-action">
                        <a href="#">Techno</a>
                        <a class="viewmore btn btn-vue" href="#">See more</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card small event popevent left">
                    <div class="card-image">
                      <img class="responsive-img" alt="image-event" src="assets/img/event6.png">
                    </div>
                    <div class="card-content">
                        <h4 class="titre-cards">Propice</h4>
                        <h6 class="truncate">Le Glazart, Paris - 21 Nov</h6>
                    </div>
                    <div class="card-action">
                        <a href="#">Techno</a>
                        <a class="viewmore btn btn-vue" href="#">See more</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card small event popevent left">
                    <div class="card-image">
                      <img class="responsive-img" alt="image-event" src="assets/img/event7.png">
                    </div>
                    <div class="card-content">
                        <h4 class="titre-cards">Macki Paradise</h4>
                        <h6 class="truncate">La Machine du Moulin Rouge, Paris - 21 Nov</h6>
                    </div>
                    <div class="card-action">
                      <a href="#">Techno</a>
                      <a class="viewmore btn btn-vue" href="#">See more</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card small event popevent left">
                    <div class="card-image">
                      <img class="responsive-img" alt="image-event" src="assets/img/event8.png">
                    </div>
                    <div class="card-content">
                        <h4 class="titre-cards truncate">Dixon Ame All Night</h4>
                        <h6 class="truncate">La Fabric, Paris - 21 Nov</h6>
                    </div>
                    <div class="card-action">
                        <a href="#">Techno</a>
                        <a class="viewmore btn btn-vue" href="#">See more</a>
                    </div>
                </div>
            </div>
        </div><!-- fin row--> 

        
        </div>
    </div>        

       
    </div> <!-- fin page content-->
</div><!-- fin container-->

</body>

<?php include_once('views/layout/footer.inc.php'); ?>

