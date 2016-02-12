# Volunteers
Projet 3A - EEMI

Le projet “Volunteers” est né du constat que les offres de bénévolat pour les événements, notamment musicaux, sont dispersées. En effet, chaque événement se charge du recrutement des bénévoles par leurs propres moyens. Cette fragmentation rend la postulation laborieuse puisque le bénévole doit effectuer une veille continuelle sur les événements qui seraient susceptibles de l’intéresser.

De même, les organisateurs cherchant des bénévoles sont contraints de passer par leur site ou plateforme et d’utiliser leurs propres ressources afin de trouver le personnel qu’il leur faut. De plus, savoir si un bénévole est qualifié ou fiable devient difficile. Lorsque les bénévoles sont recrutés, la communication reste un point contraignant à gérer pour les organisateurs. 

C'est la qu'intervient le projet Volunteers, son but est de permettre aux organisateurs d’événements de créer un espace dédié à leur événement et de pouvoir expliquer leurs besoins en terme de bénévoles. Pareillement, les bénévoles pourront facilement postuler à de multiples événements et avoir un seul et même point de contact. Les organisateurs pourront noter et laisser un avis aux bénévoles ayant participé à leurs événements afin de faciliter la tâche aux organisateurs lors de prochains évènements.

# Architecture utilisée

L'architecture utilisée pour le projet Volunteers est une architecture MVC basé sur un framework objet en PHP.
Elle est composé de un dossier principal nommé volunteers, ce dossier contient différents fichiers, gitignore pour ignorer les fichiers sensibles du dépot git, .htaccess pour la configuration de la réecriture d'URL, index.php qui est le controleur principal de l'application ainsi que le readme, ce dossier app contient plusieurs sous dossier :

* App : Ce dossier contient les élements nécessaire au fonctionnement de l'application, trois fichiers, app.php qui est le controleur secondaire qui permet la redirection automatique vers la bonne action lorsqu'elle est appelée, AppController.php qui contient les différents élements de contrôles communs à l'application et le fichier AppModel.php qui contient les différentes fonctions qui s'appliquent à l'ensemble du site. Ce dossier contient également deux sous dossiers, le dossier controller qui contient tout les différents controller de l'application ainsi que le dossier model qui contient tous les différents modèles de l'application.
* Assets : Ce dossier contient tout les éléments nécessaires au design du site, tel que les fichiers css, les images, les polices et les scripts js.
* Config : Ce dossier contient les différents fichiers nécessaires à la configuration du site dont les constantes.
* Core : Ce dossier contient tout les fichiers de core, ces fichiers servent au bon fonctionnement du site, ils sont les premiers fchiers appelés dans le controleur principal, les dossiers présent dans app hérite du CoreController et du CoreModel qui eux-même héritent de Core.php.
* Lib : Ce dossier contient les différentes classes et des fichiers de sécurisation du site.
* Views : Ce dossier contient les différentes vues du site web, chaque vue est rangée dans un sous dossier qui correspond au nom du controller associé.

# Contributors
Thomas Vanwelden
Janvier Sabatès
Charles Delourme
Nicolas Mimault
Salim Ziadi
Jordan la Mantia
