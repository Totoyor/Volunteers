$(document).ready(function(){

    $("#bt-signup").click(function(){
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

    });


    // à tester
    /*
    $(function(){
        alert('test');
        $('a.delete').click(function(){
            $.ajax({
                type:"POST",
                url:'controleur/admin/interview/list/index.php',
                data: 'del='+$(this).attr('id'),
                success: function(retour){
                    alert(retour);
                },
                error:function(XMLHttpRequest,textStatus,errorThrown){
                    alert(textStatus);
                }
            });
            return false;
        });
    });
    */
})


