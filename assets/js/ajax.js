$(document).ready(function(){

<<<<<<< HEAD
    /*$("#bt-a-choisir").click(function(){
=======
    $("#bt-signup").click(function(){
>>>>>>> b55030087b52b6e0b859f3942dc87e949b6a6293

        $.ajax(
            'lien', // Lien du script
            {
                email: $("#email").val(),  // Nous récupérons les valeurs
                password : $("#password").val(),
    }),

    function(data){

        if(data === true){
            // Le membre est inscrit. Ajoutons lui un message dans la page HTML.
            $("#resultat").html("<p>Vous avez été inscrit avec succès !</p>");
            console.log('OK');
        }
        else{
            // Le membre n'a pas été connecté. (data vaut ici "failed")
            $("#resultat").html("<p>Erreur lors de l'inscription...</p>");
            console.log('NOK :(');
        }

    };

    });*/

    $('#login-form').on('submit', function(){

        var login = $('#email').val();
        var password = $('#password').val();

        $.ajax({

            url     :   '?module=user&action=connet',
            type    :   'post',


        });
    });


})