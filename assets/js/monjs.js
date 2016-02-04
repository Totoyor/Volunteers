$(document).ready(function () {
 
    
    $(".hidden-content-rightside")
		.css({
		"position" : "absolute",
		})
    
    $(".titre_right")
		.css({
		"position" : "absolute",
        "text-align" : "center",
		})
    
    $(".btn_right")
		.css({
		"position" : "absolute",
        "top" : "400px",
		})
/* left */    
    $(".hidden-content-leftside")
		.css({
		"position" : "absolute",
		})
    
    $(".titre_left")
		.css({
		"position" : "absolute",
        "text-align" : "center",
		})
    
    $(".btn_left")
		.css({
		"position" : "absolute",
        
		})
    
/* */
    
$(".bgorange").hover(
    
    function(){
    $('.titre_right').addClass("active_titre");
    },
    
    function(){
    $('.titre_right').removeClass("active_titre");
    }
    
    );
    
    
 $(".bgorange").hover(   
     
     function(){
$('.hidden-content-rightside').addClass("hidden_show");
    },
    
     function(){
         
$('.hidden-content-rightside').removeClass("hidden_show");
    }
);
    
    
    
    /*  */
    
    
    $(".bgblue").hover(
    
    function(){
    $('.titre_left').addClass("active_titre");
    },
    
    function(){
    $('.titre_left').removeClass("active_titre");
    }
    
    );
    
    
 $(".bgblue").hover(   
     
     function(){
$('.hidden-content-leftside').addClass("hidden_show");
    },
    
     function(){
         
$('.hidden-content-leftside').removeClass("hidden_show");
    }
);
    
    
  /* CREA eVENT */
    
    
$(".fb_click").click( 
  
      function(){      
$('.field_fb').fadeIn("slow");
    }
  );
    
    
$(".ins_click").click( 
      function(){      
$('.field_ins').fadeIn("slow");
    }
  );
    
    
    

$(".yout_click").click( function(){      
$('.field_yout').fadeIn("slow");
    }
  );
    
$(".tw_click").click( function(){      
$('.field_tw').fadeIn("slow");
    }
  );
    
/*
    
   

    $(".bgorange").mouseover(function () {
        $(".hidden-content-rightside").show("slow");
    })

    $(".bgorange").mouseleave(function () {
        $(".hidden-content-rightside").toggle("slow");
    })

    $(".bgblue").mouseover(function () {
        $(".hidden-content-leftside").show("slow");
    })

    $(".bgblue").mouseleave(function () {
        $(".hidden-content-leftside").toggle("slow");
    })
    
    */
    
    
    
    

    // Initialize collapse button
    $(".button-collapse").sideNav();
    // Initialize collapsible (uncomment the line below if you use the dropdown variation)
    //$('.collapsible').collapsible();

    $('.button-collapse').sideNav({
            closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        }
    );

    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    $(document).ready(function () {
        $('select').material_select();
    });


    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    $(".newmiss").hide();
    $(".newdate").hide();
    $(".saveyour").hide();
    $(".saveyour").show("slow");

    /*$(".addmiss").click(function () {
     $(".newmiss").fadeIn("100");
     })*/

    $(".showend").click(function () {
        $(".newdate").fadeIn("100");
        $(".showend").hide("slow");
    })

    $(".page_event")
        .css({
            "position": "relative",
            "left": "-2000px"
        })

    $(".page_event").animate({
            left: '+=2000px'
        }, {queue: true, duration: 500}
    );

    /*$(".addmiss").click(function (){

     var div2 = $('<div>');
     div2.attr('class', 'input-field col s8 secure-mission offset-m1');

     var label = $('<label>Mission</label>');
     label.appendTo('.mission');

     var input = $('<input>');
     input.attr('type', 'text');
     input.attr('id', 'icon_prefix');
     input.attr('class', 'validate');
     input.attr('name', 'missions[]');
     input.appendTo('.mission');

     div2 += $('</div>');
     div2.appendTo('.mission');
     });*/

    var i = 0;

    $(".addmiss").click(function () {
        i++;
        //$("#first-mission-field").clone().attr('id', 'first-mission-field' + i).appendTo("#new-mission");
        $("#mission-field").clone().attr('id', 'mission-field' + i).removeClass("hide").appendTo("#new-mission");
    });

    $('.dropify').dropify();
    
     $('.nav-profil a').click(function(e) {
        e.preventDefault();
        $('a').removeClass('nav-profil-active');
        $(this).addClass('nav-profil-active');
    });



    $('#genre-categories .categories').click(function () {

        i++;

        var str = $(this).text();

        $("#chip-bulle").clone().attr('id', 'chip-bulle' + i).appendTo("#div-cat-chip");

        d = document.getElementById('#chip-bulle' + i);

        d.html = str;

        console.log(str);
        console.log(d);
    });
    
    $(".list-missions").hide();
    
    $(".show-missions").click(function(){
    $(".list-missions").slideToggle("slow");
});



});

var geocoder;
var map;

function initMap() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
        zoom: 8,
        center: latlng
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
}

function codeAddress() {
    var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}
