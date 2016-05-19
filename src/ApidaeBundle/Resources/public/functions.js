/**
 * Created by Nadia on 18/04/2016.
 */
$("document").ready(function() {
    $(".filtres").click(function() {
        console.log('http://localhost/sites/projetApidae/web/app_dev.php/recuperationJson/'  + $(this).val() + "/" + $(this).attr('name'));
        if($(this).attr('checked')) {
            console.log("checked");
            $.ajax({
                type : 'POST',
                url  : 'http://localhost/sites/projetApidae/web/app_dev.php/recuperationJson/'  + $(this).val()  + "/" + $(this).attr('name'),
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                beforeSend: function() {
                    console.log('en attente');
                },
                success: function(data) {
                    //TODO function de réponse ajax
                    console.log('Ca marche');
                    var services = data.services;
                    var paiements = data.modesPaiement;
                    var classments = data.classements;
                    var objets = data.objets;

                    //récupération de la section contenant la liste des objets
                    var sectionListe = $("#listeDobjets");
                    sectionListe.empty();
                    //parcours de chaque objets
                    $.each(objets, function(index) {
                        var newArticle = '<article id="article'+ index +'"></article>';
                        $(newArticle).addClass("objetListe").append($('<h2>'+ objets[index].nom +'</h2>')).appendTo($(sectionListe));

                        if(objets[index].multimedias.length > 0) {
                            console.log("img");
                            var newFirstImg = '<div id="divImg'+ index +'"></div>';
                            $(newFirstImg).addClass("imgListe"+ index).appendTo($('#article'+index));
                            $('#divImg'+ index).append('<a href="'+ objets[index].multimedias[0].mul_url_liste +'"><img src="'+ objets[index].multimedias[0].mul_url_liste +'"> </a>');
                        }
                        //$('#test'+index).append("<toto></toto>");

                        var newDiv = '<div id="divInfos'+ index +'"></div>';
                        $(newDiv).addClass("infosListe").appendTo($('#article'+index));
                        if(objets[index].commune) {
                            $('#divInfos'+ index).append($('<p>'+ objets[index].commune.com_nom +'</p>'));
                        }

                        if(objets[index].tarif_en_clair) {
                            $('#divInfos'+ index).append('<p>'+ objets[index].tarif_en_clair +'</p>');
                        }

                        var newDivDescr = '<div> </div>';
                        $(newDivDescr).addClass("description").append('<h4> Description : </h4>')
                            .append('<p>'+ objets[index].traductions[0].tra_description_courte  +'</p>')
                            .appendTo($('#divInfos'+ index));
                    });

                    console.log('Fin');
                }
            });
        } else {
            //TODO if unchecked
            console.log("unckecked");
        }
    })
});


//TODO ajouter le lien pour détails
//TODO mettre la bonne langue

/*
Exemple
 $('.imgProjet').click(function() {
     var idProjet = $(this).attr('id').split('-')[1];
     $.ajax({
     url: '{{path('ajax_get_projet')}}',
     type: 'POST',
     data: {'id': idProjet},
     dataType: 'json',
     success: function(data) {
         afficherImages(data.photos);
         afficherProjet(data.projet, data.etapes);
     }
 });
 });
 */