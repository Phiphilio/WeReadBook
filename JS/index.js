async function afficherLivres() {
    const reponse = await fetch('../JS/livres.json')
    const livres = await reponse.json()

    // récupère le div qui contiendra tous les livres
    const listeLivres = document.querySelector(".block-liste-item")
    listeLivres.innerHTML = ""

    for (let i = 0; i < livres.length; i++) {
        //je créé une div
        const bookDiv = document.createElement("div");
        const link = document.createElement("a")
        const listeItem = document.createElement("div")
        const contenuListeItem = document.createElement("div")

        bookDiv.className = "book"
        bookDiv.setAttribute('data-title', livres[i].title)
        bookDiv.setAttribute('data-author', livres[i].author)
        bookDiv.setAttribute('data-release-date', livres[i].published_date)

        //je donne un lien
        link.href = "#"

        listeItem.className = "categorie-liste-item"
        contenuListeItem.className = "categorie-liste-item-contenu"

        const h2 = document.createElement("h2")
        h2.innerText = livres[i].title

        const firstParagraphe = document.createElement("p")
        firstParagraphe.innerHTML = "Par " + livres[i].author + "<br>Date de sortie: " + livres[i].published_date

        //ajout dans contenuListeItem

        contenuListeItem.appendChild(h2)
        contenuListeItem.appendChild(firstParagraphe)

        //ajout dans listeItem
        listeItem.appendChild(contenuListeItem)

        //ajout dans link
        link.appendChild(listeItem)

        //ajout dans bookDiv
        bookDiv.appendChild(link)
        // ajout dans listeLivres
        listeLivres.appendChild(bookDiv)

    }
}

// j'appelle la fonction pour qu'elle s'exécute
afficherLivres()

//fonction de recherche de livre
function rechercherLivres(recherche, bok) {

    const regex = new RegExp(recherche, "i")

    // récupère le div qui contiendra tous les livres
    const listeLivres = document.querySelector(".block-liste-item")
    listeLivres.innerHTML = ""

    bok.forEach(boks => {
        const test = regex.test(boks.title)

        if (test) {
            livresObtenus(boks, listeLivres)
        }
    });
}

function livresObtenus(livreTrouve, listeLivres) {
    if (livreTrouve) {
        //affichage dynamique des livre du livre correspondant

        //je créé le bloc qui contiendra les infos du livre
        const bookDiv = document.createElement("div");
        const link = document.createElement("a")
        const listeItem = document.createElement("div")
        const contenuListeItem = document.createElement("div")

        bookDiv.className = "book"
        bookDiv.setAttribute('data-title', livreTrouve.title)
        bookDiv.setAttribute('data-author', livreTrouve.author)
        bookDiv.setAttribute('data-release-date', livreTrouve.published_date)

        //je donne un lien
        link.href = "#"

        listeItem.className = "categorie-liste-item"
        contenuListeItem.className = "categorie-liste-item-contenu"

        const h2 = document.createElement("h2")
        h2.innerText = livreTrouve.title

        const firstParagraphe = document.createElement("p")
        firstParagraphe.innerHTML = "Par " + livreTrouve.author + "<br>Date de sortie: " + livreTrouve.published_date

        //ajout dans contenuListeItem

        contenuListeItem.appendChild(h2)
        contenuListeItem.appendChild(firstParagraphe)

        //ajout dans listeItem
        listeItem.appendChild(contenuListeItem)

        //ajout dans link
        link.appendChild(listeItem)
        console.log("test")
        //ajout dans bookDiv
        bookDiv.appendChild(link)
        // ajout dans listeLivres
        listeLivres.appendChild(bookDiv)
    } else {
        // récupère le div qui contiendra tous les livres
        console.log("test")
        const listeLivres = document.querySelector(".block-liste-item")
        listeLivres.innerHTML = "" // je nettoie le dom

        const bookDiv = document.createElement("div");
        bookDiv.className = "book"

        const Paragraphe = document.createElement("p")
        Paragraphe.innerText = "Aucun livre ne correspond à la recherche "

        bookDiv.appendChild(Paragraphe)

        listeLivres.appendChild(bookDiv)
    }

}

const searchInput = document.getElementById("searchInput");

//ajout d'un listener qui écoute l'évènement keydown et qui regarde quand keydown correspond à la touche entrer (enter)
searchInput.addEventListener("keydown", async (event) => {
    // le lsiterner écoute juste les touches
    const reponse = await fetch('../JS/livres.json')
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