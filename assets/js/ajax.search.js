$(document).ready(function(){

    var blocSearch = $('.bloc_search');

    $('.bloc_search').hide();

    $('#input-search').on('keyup', function(){

        $('.div_results').children().hide();

        var recherche = $(this).val();

        if (recherche.length >= 1) {

            $.ajax({

                url         :   '?module=event&action=search',
                type        :   'GET',
                data        :   $('#search-event').serialize(),
                dataType    :   'json',

                success :   function(data) {
                    $.each(data, function(key, value){
                        var copie = blocSearch.clone().show().appendTo('.div_results');
                        copie.find('.responsive-img').attr('src', 'assets/img/events/uploads/' + value.coverPicture);
                        copie.find('.titre-cards').text(value.nameEvent);
                        copie.find('.lien-titre').attr('href', 'event/show/'+value.idEvent);
                        copie.find('.location-cards').text(value.locationEvent + ', ' + value.startEvent);
                        copie.find('.card-categorie').text(value.nameCategorie);
                        copie.find('.viewmore').attr('href', "event/show/"+value.idEvent);
                    })
                }

            });
        } else if (recherche.length == 0) {

            $('.div_results').children().show();
            $('.bloc_search').hide();

        }
    });
})