
function init(){ // L'appel de cette fonction se fait à la fin du fichier archive-formation.php
    
    console.log("INIT")
    favorite = localStorage.getItem("id_fav");
    fav_stored = [];
    if (favorite != null){
        fav_stored = favorite.split(',');
        console.log(fav_stored);
    }

    // installation des icones pleines si ce sont des favoris (présentes dans fav_stored)
    for(let i = 0; i < fav_stored.length; i++){
        id_fav = fav_stored[i];        
        if (id_fav != "null"){
            myFormation = document.getElementById(id_fav);
            btn = myFormation;
            btn.innerHTML ='<span class="dashicons dashicons-star-filled"></span>' ;
        }

    }
}

function display_wish() // appel depuis le fichier page-wishlist.php
{
    console.log("display_wish function");
    favorite = localStorage.getItem("id_fav");
    fav_stored = [];
    if (favorite =='null'){// Le premier ajout dans le LocalStorage est précédé de l'élément null, ici on l'enlève 
        //
    }
    else {
        if (favorite != null){
            fav_stored = favorite.split(',');
            console.log(fav_stored);
        }
    }


    

    let eleTableListe = document.getElementsByClassName("ligne");// Pour traiter les formations likées
    let container = document.getElementsByClassName("container-tableau")
    const url = '?wish=' + favorite ;
    
    var requete = new XMLHttpRequest();
    console.log("Element Tableau : ", eleTableListe);
    requete.open("GET", url, true); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
    
    requete.onreadystatechange = function()
    {
        if (requete.readyState===4 && requete.status === 200){

            compte = 0 ;

            for (let i = 0; i < eleTableListe.length; i++)
            {
                id_html = eleTableListe[i].id;
                if(fav_stored.indexOf(id_html.toString()) > -1) {//index de l'id sup à -1 => présent
                    eleTableListe[i].style.display = null  ;  
                    //console.log("Favoris existants");   
                    compte +=1 ;       
                }
            }
            if (compte == 0){
                //console.log('Cas où aucune formation sélectionnée');
                container[0].innerHTML = "<h3>Aucune formation mise comme favori</h3>";
            }
        }  
    } 
    requete.send();
}



function like_dislike(id) {  // Se déclenche dès que l'on clique sur l'étoile (valable sur les 2 fichiers) 

    console.log("like_dislike function");
 
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
