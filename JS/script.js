document.addEventListener('DOMContentLoaded', () => {
    let booksData = [];

// Chargement du fichier livres.json
fetch('./JS/livres.json')
    .then(response => {
        if (!response.ok) {
            throw new Error("Erreur HTTP, status = " + response.status);
        }
        return response.json();
    })
    .then(books => {
        // Affichage du contenu brut du JSON dans la console
        console.log(books);

        // stockage  des données des livres
        booksData = books;

        // affichage des livres à l'état initial
        displayBooks(booksData);

        // Sélectionner l'élément HTML où les livres seront affichés
        const booksList = document.getElementById('booksList');

        // Vider la liste au cas où elle contiendrait déjà des éléments
        booksList.innerHTML = '';

        // Parcourir chaque livre dans le JSON
        books.forEach(book => {

            // Afficher les propriétés de chaque livre dans la console pour faciliter les résolutions de problèmes
            console.log("Id:", book.id);
            console.log("Title:", book.title);
            console.log("Author:", book.author);
            console.log("Published Date:", book.published_date);
            console.log("Reserved:", book.reserved);

            // Créer un élément de liste pour chaque livre
            const listItem = document.createElement('div');
            listItem.className = 'bookItem';

            // Ajouter le contenu du livre dans l'élément
            listItem.innerHTML = `<img src="${book.image}" alt="${book.title}" class="bookImage"><br> <strong>${book.title}</strong> par ${book.author} <br>Date de publication : ${book.published_date} <br>Réservé : ${book.reserved ? 'Oui' : 'Non'}`;

            // Ajout de l'élément à la liste
            booksList.appendChild(listItem);
        });
    })
    .catch(error => {
        console.error("Erreur lors du chargement du fichier JSON:", error);
    });

    // Fonction pour afficher les livres
    function displayBooks(books) {

        const booksList = document.getElementById('booksList');
        booksList.innerHTML = ''; // Vider la liste actuelle

        // Parcourir chaque livre et l'ajouter à la liste
        books.forEach(book => {
            const listItem = document.createElement('div');
            listItem.className = 'bookItem';

            listItem.innerHTML = `<img src="${book.image}" alt="${book.title}" class="bookImage"><br> <strong>${book.title}</strong> | <strong>${book.author}</strong> <br> Date de publication : ${book.published_date} <br> Réservé : ${book.reserved ? 'Oui' : 'Non'}`;

            // ajout de l'élément à la liste
            booksList.appendChild(listItem);
        });
    }
    
    // Ajout d'un event listener pour le champ de recherche par auteur et par titre en utilisant la méthode filtrage combiné grace à "||"
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredBooks = booksData.filter(book => 
            book.title.toLowerCase().includes(searchTerm) || 
            book.author.toLowerCase().includes(searchTerm)
        );      
        // Afficher les livres filtrés
        displayBooks(filteredBooks); 
    });

    
    // Ajouter des boutons de tri
    const sortAscBtn = document.getElementById('sortAsc');
    const sortDescBtn = document.getElementById('sortDesc');

    sortAscBtn.addEventListener('click', () => {
        const sortedBooks = [...booksData].sort((a, b) => new Date(a.published_date) - new Date(b.published_date));
        displayBooks(sortedBooks);
    });

    sortDescBtn.addEventListener('click', () => {
        const sortedBooks = [...booksData].sort((a, b) => new Date(b.published_date) - new Date(a.published_date));
        displayBooks(sortedBooks);
    });
});

// Activation du menu burger 
var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;


function openNav() {
  sidenav.classList.add("active");
}


function closeNav() {
  sidenav.classList.remove("active");
}

// let galImages = document.querySelectorAll('lien-conteneur-photo');

// for(let i = 0; i < galImages.length; i++){
//     let image = galImages[i];
//     image.addEventListener('click', showSinglePict, false);
// }

// function showSinglePict(e){
//     let image = e.target;
//     let imageContainer = document.getElementById('galleryContainer');
//     let bigImage = imageContainer.querySelector('img');
//     bigImage.src = image.src;
//     imageContainer.classList.toggle('visible')
//     imageContainer.addEventListener('click', closeSinglePict, false);
// }

// function closeSinglePict(){
//     let imageContainer = document.getElementById('galleryContainer');
//     imageContainer.classList.toggle('visible');
// }


