// Initialisation de la navigation latérale pour le format mobile.
$(".button-collapse").sideNav();

// Initialisation du modal pour l'outil de débug.
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});
