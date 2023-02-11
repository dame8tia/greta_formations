console.log("coucou en dehors des fcts  IT S SURE");

function display_wish()
{
    console.log("je suis sur la page Wishlist");
    favorite = localStorage.getItem("id_fav");
    console.log(favorite);
    
    //Code JavaScript
    var requete = new XMLHttpRequest();
    requete.open("GET",'?wish=' + favorite, true); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
    requete.onload = function() {
    //La variable à passer est alors contenue dans l'objet response et l'attribut responseText.
        //let data = JSON.parse(requete.responseText)
    };   
    requete.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    requete.send();
}

function like_dislike(id) {   
 
    let fav = localStorage.getItem("id_fav");     
    let fav_stored = [];// Sert pour tester la présence d'une formation, et le retrait si doublon
    let present = false;

    let element = document.getElementById(id);
    let classElement = element.innerHTML

    // Test du LocalStorage : déjà des formations stockées ? o/n
    if (fav){
        // utilisation d'un tableau
        fav_stored = fav.split(',');

        // test si présence ou non de la formation dans le LocalStorage
        if(fav_stored.indexOf(id.toString()) > -1) {//index de l'id sup à -1 => présent
            present = true;
        }
        else {present=false;}
    }

    // test le remplissage de l'icone
    if (classElement == '<span class="dashicons dashicons-star-filled"></span>')// étoile pleine
    {
        // l'étoile se vide
        element.innerHTML = '<span class="dashicons dashicons-star-empty"></span>'
        // retrait du favori
        var index = fav_stored.indexOf(id.toString());
        if (index > -1) {
            //Retrait
            fav_stored.splice(index, 1);
            // Mise à jour de fav avant envoi au LocalStorage
            fav="";
            for(var i = 0; i < fav_stored.length; i++){
                if (i==0){
                    fav += fav_stored[i];
                }
                else{
                    fav += ","+fav_stored[i]; 
                }                
            }
            // Mise à j du LocalStorage
            localStorage.setItem("id_fav", fav);     
        }
    }
    else {// etoile vide
        
        if (present){// ne devrait jamais se produire
            //On ne fait rien
        }
        else {
            element.innerHTML = '<span class="dashicons dashicons-star-filled"></span>';
            // récupération de la liste des formations déjà présentes dans le LoalStorage

            // fav n'a pas bougé ; on ajoute l'id clicked
            fav = fav + "," + id.toString();  
            // ajout de la formation
            add_formation(fav);
        }
    }       
    console.log("Id dans le local storage: ", localStorage.getItem("id_fav"));  // vérification de ce que l'on obtient
} 


function add_formation(fav){
    localStorage.setItem("id_fav", fav);
}
    
function delete_fav() {   
    localStorage.clear(); 
    items_table = document.querySelectorAll('.dashicons.dashicons-star-filled');
    for (let i = 0; i < items_table.length; i++) {
        items_table[i].outerHTML = '<span class="dashicons dashicons-star-empty"></span>'
      }    
} 
