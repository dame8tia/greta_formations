console.log("coucou en dehors des fcts  IT S SURE");

function display_wish()
{
    console.log("je suis sur la page Wishlist");
    console.log("Id dans le local storage: ", localStorage.getItem("id_fav"));  
    favorite = localStorage.getItem("id_fav");
    console.log(favorite);
    
    //Code JavaScript
    var requete = new XMLHttpRequest();
    requete.onload = function() {
    //La variable à passer est alors contenue dans l'objet response et l'attribut responseText.
    var variableARecuperee = favorite.responseText;
    };
    requete.open(get, page-wishlist.php, true); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
    requete.send();


}

function like_dislike(id) {   

    //let fav = "";  
    let fav = localStorage.getItem("id_fav");     
    let fav_stored = [];// pour stocker les formations déjà likées dans un tableau; Sert à tester si présent
    let present = false;

    let element = document.getElementById(id);
    console.log(element);
    let classElement = element.innerHTML
    console.log("element.innerHTML :", classElement);
    /*    element.innerHTML = '<span class="dashicons dashicons-star-filled"></span>' */

    if (classElement == '<span class="dashicons dashicons-star-filled"></span>')
    {
        element.innerHTML = '<span class="dashicons dashicons-star-empty"></span>'
        // retirer
        console.log("fav : Pour retrait de l'id car déjà présent : ", fav )
        var index = fav.indexOf(id);
        if (index > -1) {
        fav.splice(index);
        }
    }
    else {
        element.innerHTML = '<span class="dashicons dashicons-star-filled"></span>'

    }



    if (fav){// si il existe déjà des formations likées ALORS on récupére les favoris sous la forme d'un tableau
        fav_stored = fav.split(',');
        console.log("fav_stored :", fav_stored)
        if(fav_stored.indexOf(id.toString()) > -1) {// si la formation likée est déjà présente dans les favoris ()son index est supérieur à -1 ALORS
            console.log("Déjà stocké ? true");
            present = true;
            let classElement = element.innerHTML
            if (classElement == '<span class="dashicons dashicons-star-filled"></span>') 
            {
                // modifier l'étoile en vide

                // le retirer du local storage
/*                 console.log(" Element ",id, "A supprimer du storage : " , fav_stored);
                fav_stored = fav_stored.filter((ind) => ind !== id);
                console.log("Retiré ? : ",fav_stored); */
            }
            // BENOIT : si l'icône est pleine repasser l'icone à vide : Attention à ce traitement, il faudra vérifier que cela va dans le bon sens.
        } else {
            console.log("Déjà stocké ? false");
            present = false;
        }
    }// sinon <=> 1ère fois donc on l'ajoute
    else {
        localStorage.setItem("id_fav", id);
        element.innerHTML = '<span class="dashicons dashicons-star-filled"></span>';
        //  BENOIT : rajoute le traitement pour changer l'icone en pleine
    }


    // si l'id de la formation a déjà été likée alors on passe notre chemin
    if (present){
        //pass
    }
    else { //sinon on enregistre
        fav = fav + "," + id.toString();  
        localStorage.setItem("id_fav", fav); 



        element.innerHTML = '<span class="dashicons dashicons-star-filled"></span>';
        // BENOIT : rajoute le traitement pour changer l'icone en pleine
    }       
        
    console.log("Id dans le local storage: ", localStorage.getItem("id_fav"));  // vérification de ce que l'on obtient
} 
    
function delete_fav() {   
    localStorage.clear(); 
    items_table = document.querySelectorAll('.dashicons.dashicons-star-filled');
    for (let i = 0; i < items_table.length; i++) {
        items_table[i].outerHTML = '<span class="dashicons dashicons-star-empty"></span>'
      }    
} 
    
/* jQuery(document).ready(function($) {
    let fav = localStorage.getItem("id_fav");   
    if (fav) {     
        fav = JSON.parse(fav);     
        let html = '<ul>';     
        fav.forEach(function(id) {       
            html += '<li>' + id + '</li>';     
        });     
        html += '</ul>';     
        $('#fav-list').html(html);   
    }
}); */