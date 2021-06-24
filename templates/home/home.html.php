<main class="container">

<h2 class='text-center text-uppercase mt-3'><?php echo $message ?></h2>

<section class="start">
    <h3>Pour Débuter:</h3>
    <h4>La base de Données</h4>
    <ul>
        <li><p>La première étape pour utiliser ce framework est de s'occuper de la connexion à la base de données. Dans le dossier Core, le fichier Database.php s'occupe de cette connexion. Il faut changer <strong>le nom de la database, le nom et le mot de passe de l'utilisateur </strong> lors de l'instanciation de l'objet PDO.
        <br>
        <span class="important"> new PDO('mysql:host=localhost;dbname=nomDB', 'nomUtilisateur', 'motDePasse')</span>
        <br>
        La méthode getPdo() est static. Il ne faut pas instancier un objet PDO pour l'utiliser. Elle s'appelle depuis sa classe. <br>
        <span class="important">\Database::getPdo();</span> </p>
        </li>

        <li>Dans le fichier App.php qui se trouve dans le dossier Core, se trouve la méthode statique Process. Elle ne doit être utiliser qu'une seule fois, dans le fichier index.php. La page par défaut est la documentation. <strong>Pour changer cela, il faut changer la valeur de controllerName.</strong> <br>
        Un controller permet de faire permet de faire le lien entre les model et les vues. 
        </li>
    </ul>

</section>

<section class="procedure mt-4">
    <h3>Les étapes de mise en place</h3>

    <h4>Prenons un exemple</h4>
    <ul>
        <li>Nous voulons ici créez une application avec des burgers tous différents. La base de données créé est la base burgers. On fait les étapes précédentes pour la connexion à la base de données. <br>
        Sur cette appli, on a une liste de tous les burgers sur l'accueil. <br>
        On commence par créer <strong>le Model Burger </strong> (première lettre en majuscule et au singulier)qui hérite du model Model. Dans le fichier on met en premier le namespace (nom de famille) Model puis on crée la classe. On assigne ensuite la table dans la base de données à la propriété table du model. Grâce à ce model, on peut accéder à la méthode findAll() du model Model.
        Pour faire le lien entre le model et la page de l'appli, on crée le controller Burger 
        (première lettre en majuscule et au singulier) qui hérite du controllers Controller. 

        </li>
    </ul>

</section>




<section class="interaction">
<h3><?php echo $messageChangeable ?></h3>

<form action="index.php?controller=home&task=index" method="POST">

    <input type="text" name="messageChangeable" placeholder="Votre message">
    <button type="submit" class="btn btn-success">Changez</button>


</form>

</section>


</main>