$(document).ready(function(){

    $("#bt-a-choisir").click(function(){

        $.post(
            '?module=home&action=signup', // Lien du script
            {
                email: $("#email").val(),  // Nous récupérons les valeurs
                password : $("#password").val(),
    }),

    function(data){

        if(data === true){
            // Le membre est connecté. Ajoutons lui un message dans la page HTML.

            $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
            console.log('OK');
        }
        else{
            // Le membre n'a pas été connecté. (data vaut ici "failed")

            $("#resultat").html("<p>Erreur lors de la connexion...</p>");
            console.log('NOK :(');
        }

    };

    });
})