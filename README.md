# Volunteers
Projet 3A - EEMI

Le projet “Volunteers” est né du constat que les offres de bénévolat pour les événements, notamment musicaux, sont dispersées. En effet, chaque événement se charge du recrutement des bénévoles par leurs propres moyens. Cette fragmentation rend la postulation laborieuse puisque le bénévole doit effectuer une veille continuelle sur les événements qui seraient susceptibles de l’intéresser.

De même, les organisateurs cherchant des bénévoles sont contraints de passer par leur site ou plateforme et d’utiliser leurs propres ressources afin de trouver le personnel qu’il leur faut. De plus, savoir si un bénévole est qualifié ou fiable devient difficile. Lorsque les bénévoles sont recrutés, la communication reste un point contraignant à gérer pour les organisateurs. 

C'est la qu'intervient le projet Volunteers, son but est de permettre aux organisateurs d’événements de créer un espace dédié à leur événement et de pouvoir expliquer leurs besoins en terme de bénévoles. Pareillement, les bénévoles pourront facilement postuler à de multiples événements et avoir un seul et même point de contact. Les organisateurs pourront noter et laisser un avis aux bénévoles ayant participé à leurs événements afin de faciliter la tâche aux organisateurs lors de prochains évènements.

# Architecture utilisée

l'architecture utilisée pour le projet Volunteers est une architecture MVC.
Elle est composé de un dossier principale nommé volunteers, ce dossier contient différents fichiers, gitignore pour ignoré les fichiers sensibles du dépot git, .htaccess pour la configuration de la réecriture d'URL, index.php qui est le controleur principale de l'application ainsi que le readme, ce dossier app contient plusieurs sous dossier :

* App : Ce dossier contient les élements nécessaire au fonctionnement de l'application, trois fichiers, app.php qui est le controleur secondaire qui permet la redirection automatique vers le bon controller lorsqu'on appel une fonction, AppController.php qui contient les différents élements de contrôles commun à l'application entière et le fichier AppModel.php qui contient les différents fonctions qui peuvent s'appliqué à l'ensemble du site. Ce dossier contient également deux sous dossiers, le dossier controller qui contient tout les différents controller de l'application ainsi que le dossier model qui contiendra tout les différents model de l'application.
* Assets : Ce dossier contient tout les élements nécessaire au design du site, tel que les fichiers css ou encore js.
* Config : Ce dossier contient les différents fichiers nécessaire à la configuration du site.
* Core : Ce dossier contient tout les fichiers de core, ces fichiers servent au bon fonctionnement du site web, ils sont les premiers fchiers appeler dans le controleur principale, les dossiers présent dans app hérite du CoreController et du CoreModel.
* Lib : Ce dossier contient les différentes fonctions précedemment codé.
* Views : Ce dossier contient les différentes vue du site web, chaque vue est rangé dans un sous dossiers qui correspond au nom de la fonctionnalité ou de la page développer.

# Contributors
Thomas Vanwelden
Janvier Sabatès
Charles Delourme
Nicolas Mimault
Salim Ziadi
Jordan la Mantia
