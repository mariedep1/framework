  <?php 
//ce fichier est le seul est unique point d'entrée du framework pour naviguer, il faut utiliser les controller qui gèrent les affichages de templates et redirection à travers les tâches

require_once "core/autoloading.php"; 
//ce require permet de lancer automatiquement les require_once quand une instance est faite

\App::process();