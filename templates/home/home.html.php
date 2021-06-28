<main class="container">

<h2 class='text-center text-uppercase mt-3'><?php echo $message ?></h2>



<section class="convention">

    <h3 class="important my-4">Les règles et convention à respecter</h3>

    <ul>
        <li>Les noms de classe commencent <span class="important">toujours avec une majuscule et sont au singulier</span> .</li>
        <li>Il faut penser à mettre le <span class="important"> namespace de la classe</span>, nom du dossier dans lequel le fichier se trouve pour permettre à PHP de les différencier.</li>
        <li>Le namespace <span class="important"> se trouve toujours au plus haut du fichier</span> de la classe, en dessous de la balise ouvrante php</li>
    </ul>

</section>


<section class="start mt-5">
    <h3>Pour Débuter:</h3>
    <h4>La base de Données</h4>
    <ul>
        <li>
            <p>La première étape pour utiliser ce framework est de s'occuper de la connexion à la base de données. Dans le dossier Core, le fichier Database.php s'occupe de cette connexion. Il faut changer <strong>le nom de la database, le nom et le mot de passe de l'utilisateur </strong> lors de l'instanciation de l'objet PDO.
            <br>
            <span class="important"> new PDO('mysql:host=localhost;dbname=nomDB', 'nomUtilisateur', 'motDePasse')</span>
            <br> 
            Voici un exemple :
        </p>
        <img src="templates/images/image1.png" alt="">
        </li>

        <li> 
                <p>
                La méthode getPdo() est statique. Il ne faut pas instancier un objet PDO pour l'utiliser. Elle s'appelle depuis sa classe. <br>
                <span class="important">\Database::getPdo();</span>
                <br>
                Dans ce framework, la méthode n'est utilisé qu'une seule fois, dans le constructeur du model Model. On assigne à la propriété pdo le résultat de la méthode getPdo(). Grâce à l'héritage, les enfants de la classe Model pourront utiliser la propriété pdo dans leur méthode. 
            </p>
            <img src="templates/images/image2.png" alt="">
        </li>
        <li>
            <p>
                Dans le fichier App.php qui se trouve dans le dossier Core, se trouve la méthode statique Process. Elle ne doit être utiliser qu'une seule fois, dans le fichier index.php. La page par défaut est la documentation. <strong>Pour changer cela, il faut changer la valeur de controllerName.</strong> <br>
                Comment fonctionne App.php ? Dans ce fichier, la méthode statique Process() permet de gérer les controllers et les tâches paramètrés dans l'url. <span class="important">Cette méthode récupère le nom du controller, le nom de la tache, crée un instance de ce controller afin de pouvoir exécuter la tâche. </span> <br>
                Chaque fonctionnalité a son controller. Ce controller a des tâches, c'est-à-dire des méthodes. La méthode index d'un controller permet de gérer l'affichage de la page d'acceuil. 
            </p>
            <p>Ici, nous voulons afficher sur la page d'accueil tous les garages qui se trouvent dans la base de données. La méthode index du controller Garage ressemblera donc à l'image ci-dessous.</p>
            <img src="templates/images/image3.png" alt="">
        </li>
    </ul>

</section>

<section class="navigation">

    <h4>La navigation et l'affichage</h4>
    <ul>
        <li>
            <p>
                Quand l'utilisateur arrive sur l'appli, il est automatiquement sur index.php.C'est le seul point d'entrée de l'application. <br>
                Tous passent par les controllers des fonctionnalité. Nous avons vu précédemment que grâce à App.php, nous pouvons utiliser une méthode d'un controller.
                Voici 2 exemples : 
            </p>
            <img src="templates/images/image4.png" alt=""> 
            <p>
                Dans cette exemple ci-dessus, nous avons un bouton pour ajouter une recette. Le module recette a un controller recette qui a une tâche qui permet d'ajouter une recette. Dans l'action du formulaire, <span class="important">on indique ce que l'on veut passer dans l'url si la methode est POST</span>. Ici, souligné en rouge nous avont notre point d'entrée unique, ensuite nous voulons executé une tâche du controller Recette et cette tâche est create. 
            </p>
            <img src="templates/images/image5.png" alt="">
            <p>
                Dans cette exemple, pour chaque gateau se trouvant dans la liste de tous les gâteaux, on veut un bouton qui permet d'accéder au gateau. Ici, il s'agit d'un lien (avec la classe btn de Bootstrap) qui permet d'executer la tâche show du controller Gateau.
            </p> 
        </li>
        <li>Les tâches des controller détiennent la logique pour effectuer cette tâche mais pas les requêtes sql. Les requêtes sont dans les classes Model. Les controllers font appellent aux méthodes des classes model dans leur tâches. <br>
        En plus de la logique, les tâches font appel à deux méthodes statiques:</li>
        <li>
            <p>
                La méthode statique <span class="important">\Http::redirect()</span> de la classe Http permet de naviguer d'une page à une autre. Elle prend en paramètre url sur lequel on veut rediriger l'utilisateur à la fin de la tâche.
             </p>
            <img src="templates/images/image6.png" alt="">
         </li>
        <li>
        <p>
            Pour l'affichage des pages se fait par une méthode de la classe Rendering. En se rendant sur l'application, l'utilisateur accède toujours au même template. Le template Layout. On injecte à ce template ce que l'on veut afficher par le biais d'un autre template de la fonctionnalité concerné et de la méthode <span class="important">\Rendering::render()</span> . Cette méthode fonctionne en deux étapes:
        </p>
        <ul>
            <li>Tout d'abord elle effectue le require_once du template passé en premier argument <span class="important">"nomDuDossier/nomDufichierSansExtensions"</span>. Elle démarre la mémoire tampon, fait le require du template à injecter dans le layout, puis stoppe la mémoire tampon en récupérant les données.  
            </li>
            <li>
            Dans un second temps, il récupère un tableau de données que l'on veut transmettre au layout passées en second argument grâce à la méthode compact. Celle-ci créé un tableau à partir de variable et de leur valeur. 
            Elle fait ensuite require_once du layout. </li>
        </ul>
        <img src="templates/images/image7.png" alt=""> 
        </li>

    </ul>



</section>


<section class="interaction mt-5">
    <h3><?php echo $messageChangeable ?></h3>

    <form action="index.php?controller=home&task=index" method="POST">

        <input type="text" name="messageChangeable" placeholder="Votre message">
        <button type="submit" class="btn btn-success">Changez</button>

    </form>

    <p>Voici un exemple d'interraction avec le controller home. Grâce au formulaire, nous pouvons changer le message. Lors de l'affichage de la page, le message qui s'affiche est celui qui a été défini par défaut dans la tâche du controller et que l'on transmet par la méthode render() dans un tableau. 
    </p>
    <img src="templates/images/image8.png" alt="">
    <p>Une fois le message tapé, en appuyant sur le bouton, on execute la tâche index du Controller (l'action du formulaire) . La méthode du controller surveille si la variable post est vide ou non et attribue à la variable message sa nouvelle valeur. Le controller affiche les nouvelles données et le template grâce au render.</p>
    <img src="templates/images/image9.png" alt="">

</section>


<section class="procedure mt-5">
    <h3>Les étapes de mise en place</h3>

    <h4>Prenons un exemple</h4>
    <ul>
        <li>Nous voulons ici créez une application avec des burgers tous différents. La base de données créé est la base burgers. On fait les étapes précédentes pour la connexion à la base de données. <br>
        Sur cette appli, on a une liste de tous les burgers sur l'accueil.
        </li>


        <li>
        On commence par créer <strong>le Model Burger </strong> (première lettre en majuscule et au singulier)qui hérite du model Model. Dans le fichier on met en premier le namespace (nom de famille) Model puis on crée la classe. On assigne ensuite la table dans la base de données à la propriété table du model. Grâce à ce model, on peut accéder à la méthode findAll() du model Model.
        Pour faire le lien entre le model et la page de l'appli, on crée le controller Burger 
        (première lettre en majuscule et au singulier) qui hérite du controllers Controller. 

        </li>
    </ul>

</section>






</main>