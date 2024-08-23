# WeReadBooks

projet Pepi Dev
Objectif du Projet
Développer un outil de gestion en ligne pour le prêt de livres d'une bibliothèque.
Préparation avant le début du projet
À la fin de cette étape, vous devez avoir un dépôt GitHub contenant le HTML et le CSS
fournis. L'application web doit être accessible dans un navigateur, et vous devez disposer
d'une liste non exhaustive des éléments qui ne fonctionnent pas dans l'intégration actuelle.
Création du front-end et intégration des données
À la fin de cette étape, la page d'accueil doit afficher une liste de livres générée de manière
dynamique à partir du JSON.
Mise en place de la recherche de livres
À la fin de cette étape, vous devez pouvoir rechercher des livres par titre et voir l'affichage
se mettre à jour de manière dynamique, sans rechargement de la page.

1. Créer un dépôt GitHub vide et le cloner localement. X
2. Intégrer le HTML et le CSS fournis dans l'énoncé dans le dépôt local. X
3. Parcourir le projet pour évaluer ce qui est déjà fait et ce qui reste à faire. X
4. Supprimer les données de livres écrites en HTML sur la page d'accueil. X
5. Récupérer le fichier JSON fourni.X
6. Charger le contenu du JSON dans un script JavaScript intégré au projet.X
7. Dynamiser l'affichage de la liste des livres en fonction du contenu du JSON via
   JavaScript.X
8. Ajouter un event listener sur l'input de recherche de livres par titre dans le script
   JavaScript.X
9. Écrire le code JavaScript pour masquer les livres dont le titre ne correspond pas à la
   recherche. Par exemple, si l'on tape "livre" dans l'input de recherche, cela doit afficher
   "Le livre du voyage" et "Le grand livre des gnomes" mais pas "Le seigneur des
   anneaux".X
10. La recherche doit se faire en temps réel, sans rechargement de la page.X
11. Si l'input de recherche est vide, tous les livres doivent être affichés.X
    Mise en place du tri des livres
    À la fin de cette étape, vous devez pouvoir trier la liste des livres par date de sortie et voir
    l'affichage se mettre à jour de manière dynamique, sans rechargement de la page.
    Création de la base de données et des tables
    Pour ce faire, utilisez l'extension PDO pour PHP, voici un guide utile : PDO Guide.
    À la fin de cette étape, la page d'accueil doit toujours afficher une liste de livres, mais cette
    liste sera chargée depuis une base de données via PHP au lieu d'un fichier JSON avec
    JavaScript. Le tri et la recherche doivent toujours fonctionner en utilisant JavaScript.
    Ajout de la possibilité de réserver un livre
12. Ajouter deux event listeners sur les boutons de tri de la date de sortie des livres,
    ascendant et descendant.
13. Ajouter le code permettant de trier la liste des livres en ordre ascendant ou descendant
    lors du clic sur les boutons correspondants.
14. Ce tri doit se faire en temps réel, sans rechargement de la page.
15. Le tri doit être compatible avec la recherche : il doit être possible de trier les résultats
    d'une recherche ou de rechercher dans une liste triée.
16. Créer une base de données vide avec le nom bibliotheque.
17. Exécuter le script SQL fourni dans la base de donnée créé pour générer la table et les
    données nécessaires.
18. Modifier la page d'accueil d'index.html vers index.php.
19. Retirer le code JavaScript qui charge et affiche le contenu du JSON sur la page
    d'accueil.
20. Ajouter au sommet de la page le code PHP permettant de récupérer la liste des livres
    depuis la base de données et de l'afficher sur la page d'accueil. Les fonctionnalités de
    tri et de recherche doivent rester inchangées.
21. Sur la page d'accueil, créer un formulaire de type POST contenant un bouton pour
    chaque livre. Chaque livre doit avoir son propre formulaire contenant uniquement ce
    bouton.
22. Ajouter au formulaire un input de type hidden contenant l'ID du livre tel que récupéré
    depuis la base de données.
23. Créer un script PHP à la racine du projet nommé reservation.php.
24. Ajouter l'action ./reservation.php au formulaire pour que ce soit ce script qui s'exécute à
    la soumission du formulaire.
25. Dans le script reservation.php, écrire le code pour :
    À la fin de cette étape, vous devez pouvoir réserver un livre sur la page d'accueil. En
    cliquant sur le bouton de réservation d'un livre, l'apparence du titre doit changer et la valeur
    de réservation dans la base de données doit être mise à jour.
    Technologies à Utiliser
    Aller plus loin si vous avez le temps
    Récupérer l'ID du livre soumis par le formulaire.
    Modifier la valeur de réservation du livre dans la base de données. Si le livre n'est
    pas réservé, il doit le devenir ; sinon, il doit être marqué comme non réservé.
    Rediriger vers la page d'accueil.
26. Ajouter un code couleur aux titres des livres selon leur état de réservation : rouge si
    réservé, noir sinon.
    Front-end : HTML, CSS, et JavaScript pour le développement de l'interface utilisateur
    et des interactions dynamiques.
    Back-end : PHP pour la gestion des sessions et la logique serveur.
    Base de Données : MySQL ou un système équivalent pour le stockage des données.
    Créer une nouvelle page qui permet d'afficher le detail d'un seul livre via son URL
