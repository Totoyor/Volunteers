$(document).ready(function () {

    $(".hidden-content-rightside").hide();
    $(".hidden-content-leftside").hide();
    $(".bgorange").css("background-color", "rgba(255,158,2,0.9)");

    $(".bgorange").mouseleave(function () {
        $(".bgorange").css("background-color", "rgba(255,158,2,0.4)");
    })

    $(".bgorange").mouseenter(function () {
        $(".bgorange").css("background-color", "rgba(255,158,2,0.9)");
    })

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
});