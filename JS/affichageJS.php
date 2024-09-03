
<script type ="text/javascript">
    async function afficherLivres() {
    const reponse = await fetch('../backend/jsonData.php')
    const livres = await reponse.json()

    // récupère le div qui contiendra tous les livres
    const listeLivres = document.querySelector(".block-liste-item")
    listeLivres.innerHTML = ""

for (let i = 0; i < livres.length; i++) {
    const livre = livres[i];

    genererLivres(livre, listeLivres)
    
    }
}



// j'appelle la fonction pour qu'elle s'exécute
//afficherLivres()

//fonction de recherche de livre
function rechercherLivres(recherche, bok) {

    const regex = new RegExp(recherche, "i")

    // récupère le div qui contiendra tous les livres
    const listeLivres = document.querySelector(".block-liste-item")
    listeLivres.innerHTML = ""
    let livreExiste = false;
    bok.forEach(boks => {
        const test = regex.test(boks.titre)

        if (test) {
            livresObtenus(boks, listeLivres)
            livreExiste = true
        }
    });
    // Si aucun livre n'a été trouvé, afficher le message correspondant
    if (!livreExiste) {
        livresObtenus(null, listeLivres); // Appel avec un livre falsy
    }
}

function livresObtenus(livreTrouve, listeLivres) {
    if (livreTrouve) {
        //affichage dynamique des livre du livre correspondant
        genererLivres(livreTrouve, listeLivres)
        
    } else {
        // récupère le div qui contiendra tous les livres
        console.log("test")
        const listeLivres = document.querySelector(".block-liste-item")
        listeLivres.innerHTML = ""
        /**je nettoie le dom sinon à chaque fois que la boucle forEach de la fonction rechercherLivres
         * n'allait pas trouver de livres, un bloc allait être crée pour chaque fois que le regex vérifie
         * là, je n'ai qu'un seul message
         * */

        const bookDiv = document.createElement("div");
        bookDiv.className = "pasDeLivre"

        const Paragraphe = document.createElement("p")
        Paragraphe.innerText = "Aucun livre ne correspond votre  recherche "

        bookDiv.appendChild(Paragraphe)

        listeLivres.appendChild(bookDiv)
    }

}

const searchInput = document.getElementById("searchInput");

//ajout d'un listener qui écoute l'évènement keydown et qui regarde quand keydown correspond à la touche entrer (enter)
searchInput.addEventListener("keydown", async (event) => {
    // le lsiterner écoute juste les touches
    const reponse = await fetch('../backend/jsonData.php')
    const livres = await reponse.json()
    const value = searchInput.value;

    rechercherLivres(value, livres);

});

//ajout d'un listener qui écoute l'input et réagit quand la valeur qu'il contient est vide
searchInput.addEventListener("input", () => {

    if (searchInput.value === "") {
        // j'ai regardé la valeur contenu dans l'input et si elle est vide ("") j'appelle la fonction
        /**pour avoir une chaine vide, il faut juste mettre "" */
        afficherLivres()
    }
})

function disponibleSwap(value){
    if(value!==1){
        return "Reserve";
    }
}

function disponibleButton(value){
    if(value==1){
        //comme c'est égale à 1, c'est possible de réserver
        return "reserver";
    } else {
        return "non disponible"
    }
}

//récupère les valeurs de la session
const userName = "<?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : ''; ?>";
const userId = "<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>";

function genererLivres(livre, listeBlock) {

        console.log("coucou")
        
        const bookDiv = document.createElement('div');
        bookDiv.className = 'book';
        bookDiv.setAttribute('data-title', livre.titre);
        bookDiv.setAttribute('data-author', livre.auteur);
        bookDiv.setAttribute('data-release-date', livre.date_sortie);

        const form = document.createElement('form');
        form.action = (userName && userId) 
                      ? "/HTML_+_CSS/reservationFrontend.php" 
                      : "#";
        form.method = 'post';

        const categorieListeItem = document.createElement('div');
        categorieListeItem.className = 'categorie-liste-item';

        const imgLivre = document.createElement('div');
        imgLivre.className = 'imgLivre';
        const img = document.createElement('img');
        img.src = 'monteCristo.jpeg';
        imgLivre.appendChild(img);

        const categorieListeItemContenu = document.createElement('div');
        categorieListeItemContenu.className = 'categorie-liste-item-contenu';

        const infoLivre = document.createElement('div');
        infoLivre.className = 'info-livre';
        const h2 = document.createElement('h2');
        h2.textContent = livre.titre;
        const p = document.createElement('p');
        p.innerHTML = `Par ${livre.auteur}<br>Date de sortie: ${livre.date_sortie}`;
        
        infoLivre.appendChild(h2);
        infoLivre.appendChild(p);

        // Créer les champs cachés avec les informations du livre
        const hiddenFields = ['titre', 'auteur', 'date_sortie', 'disponible', 'id'];
        for (let j = 0; j < hiddenFields.length; j++) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = hiddenFields[j];
            input.value = livre[hiddenFields[j]];
            form.appendChild(input);
        }

        const texteDiv = document.createElement('div');
        texteDiv.className="info-livre-texte "
        texteDiv.textContent = '<?php require(__DIR__ ."/../HTML_+_CSS/loremipsum.php")?>';
        infoLivre.appendChild(texteDiv);

        // Ajouter le bouton en fonction de la disponibilité du livre
        const button = document.createElement('button');
        if (livre.disponible === 1) {
            button.className = 'disponible-button';
            button.textContent = 'réserver';
        } else {
            button.className = 'Reserve-button';
            button.textContent = 'non disponible';
        }

        categorieListeItemContenu.appendChild(infoLivre);
        categorieListeItemContenu.appendChild(button);
        form.appendChild(categorieListeItem);
        categorieListeItem.appendChild(imgLivre);
        categorieListeItem.appendChild(categorieListeItemContenu);
        bookDiv.appendChild(form);

        listeBlock.appendChild(bookDiv);
    
}

if( userName ==="" && userId === "" ){
function messageAlerte (button){ 
    const buttonSelectionner = document.querySelector(button);
    buttonSelectionner.addEventListener("click", (event)=>{
        alert("vous devez être connecté pour pouvoir réserver un livre");

        event.preventDefault();
    })

}

messageAlerte(".Reserve-button")
messageAlerte(".disponible-button")
}

</script>
