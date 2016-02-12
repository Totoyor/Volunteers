$(document).ready(function() {
  var i = 0;

  $(".addmiss").click(function () {
      i++;
      $("#mission-field").clone().attr('id', 'mission-field' + i).removeClass("hide").appendTo("#new-mission");
  });

});