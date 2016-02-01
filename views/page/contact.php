<?php include_once('views/layout/header.inc.php'); ?>

<div class="bg-about"></div>
<div class="page-contact">
    <div class="page-content">
        <div class="row">
            <div class="page-content">
                <h1 class="title-section margleft"><strong>Contact us</strong></h1>
                <div class="col l6 m12 s12">
                    <form method="get" action="/search" class="form-contact">
                        <input type="text" placeholder="Your name"/>
                        <input type="text" placeholder="Email adress"/>
                        <textarea type="text" placeholder="Your message"></textarea>
                        <a class="btn btn-blue left margtop20 margbottom50" href="#">Send your message</a>
                    </form>
                </div>
                <div class="col l6 m12 s12 center margtop-responsive">
                    <iframe class="map-contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1312.221377475525!2d2.3401482581850446!3d48.868835594822116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e3c8ab00dff%3A0xc8bb3a66d8ae2daa!2s28+Place+de+la+Bourse%2C+75002+Paris!5e0!3m2!1sfr!2sfr!4v1453204800484" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <div class="row no-marg">
                        <div class="col l6 m6 s12 right"><p><i class="material-icons">email</i>contact@volunteers.com</p></div>
                        <div class="col l6 m6 s12 left"><p><i class="material-icons">phone</i>+33 6 31 87 45 65</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('views/layout/footer.inc.php'); ?>
    