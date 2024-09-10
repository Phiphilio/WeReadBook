<script type="text/javascript">
    async function fetchLivres() {
        try {
            const reponse = await fetch('../backend/jsonData.php')
            const donneesLivreRecuperer = await reponse.json()

            console.log(donneesLivreRecuperer.infoLivres)

            return donneesLivreRecuperer
        } catch (error) {
            console.log("erreur :", error)
        }
    }



    function reAfficherLivres(tableauLivre) {

        // récupère le div qui contiendra tous les livres
        const listeLivres = document.querySelector(".block-liste-item")
        listeLivres.innerHTML = ""

        for (let i = 0; i < tableauLivre.livres.length; i++) {

            const livre = tableauLivre.livres[i];
            const infoLivre = tableauLivre.infoLivres

            genererLivres(livre, listeLivres, infoLivre)

        }
    }

    const searchInput = document.getElementById("searchInput");
    //ajout d'un listener qui écoute l'input et réagit quand la valeur qu'il contient est vide
    searchInput.addEventListener("input", async () => {

        if (searchInput.value === "") {
            // j'ai regardé la valeur contenu dans l'input et si elle est vide ("") j'appelle la fonction
            /**pour avoir une chaine vide, il faut juste mettre "" */
            const donneesLivre = await fetchLivres()
            reAfficherLivres(donneesLivre)
        }
    })


    //fonction de recherche de livre
    function rechercherLivres(recherche, bok, infoLivre) {

        const regex = new RegExp(recherche, "i")

        // récupère le div qui contiendra tous les livres
        const listeLivres = document.querySelector(".block-liste-item")
        listeLivres.innerHTML = ""
        let livreExiste = false;
        bok.forEach(boks => {
            const test = regex.test(boks.titre)

            if (test) {
                livresObtenus(boks, listeLivres, infoLivre)
                livreExiste = true
            }
        });
        // Si aucun livre n'a été trouvé, afficher le message correspondant
        if (!livreExiste) {
            livresObtenus(null, listeLivres); // Appel avec un livre falsy
        }
    }

    function livresObtenus(livreTrouve, listeLivres, infoLivre) {
        if (livreTrouve) {
            //affichage dynamique des livre du livre correspondant
            genererLivres(livreTrouve, listeLivres, infoLivre)

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


    //ajout d'un listener qui écoute l'évènement keydown et qui regarde quand keydown correspond à la touche entrer (enter)
    searchInput.addEventListener("keydown", async (event) => {
        // le lsiterner écoute juste les touches
        const donneesLivre = await fetchLivres()
        const value = searchInput.value;

        rechercherLivres(value, donneesLivre.livres, donneesLivre.infoLivres);

    });

    //récupère les valeurs de la session
    const userName = "<?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : ''; ?>";
    const userId = "<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>";

    function genererLivres(livre, listeBlock, info) {

        const bookDiv = document.createElement('div');
        bookDiv.className = 'book';
        bookDiv.setAttribute('data-title', livre.titre);
        bookDiv.setAttribute('data-author', livre.auteur);
        bookDiv.setAttribute('data-release-date', livre.date_sortie);

        const form = document.createElement('form');
        form.action = (userName && userId) ?
            "/HTML_+_CSS/reservationFrontend.php" :
            "#";
        form.method = 'post';

        const categorieListeItem = document.createElement('div');
        categorieListeItem.className = 'categorie-liste-item';

        const imgLivre = document.createElement('div');
        imgLivre.className = 'imgLivre';
        const img = document.createElement('img');

        const champCacheInfoLivres = ["url_livre", "livre_description"];
        for (let k = 0; k < info.length; k++) {
            if (info[k].livre_id === livre.id) {
                img.src = info[k].url_livre;
                imgLivre.appendChild(img);
                for (let L = 0; L < champCacheInfoLivres.length; L++) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = champCacheInfoLivres[L];
                    input.value = info[k][champCacheInfoLivres[L]];
                    form.appendChild(input);
                }
            }
        }


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
        const champCacheLivres = ['titre', 'auteur', 'date_sortie', 'disponible', 'id'];
        for (let j = 0; j < champCacheLivres.length; j++) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = champCacheLivres[j];
            input.value = livre[champCacheLivres[j]];
            form.appendChild(input);
        }


        const texteDiv = document.createElement('div');
        texteDiv.className = "info-livre-texte "
        texteDiv.textContent = livre.description;
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

    if (userName === "" && userId === "") {
        function messageAlerte(classeBouton) {
            const Boutons = document.querySelectorAll(classeBouton)
            Boutons.forEach(bouton => {
                bouton.addEventListener("click", (event) => {
                    alert("vous devez être connecté pour pouvoir réserver un livre");

                    event.preventDefault();
                })
            })

        }

        messageAlerte(".Reserve-button")
        messageAlerte(".disponible-button")
    }
</script>