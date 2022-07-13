# Theme Wordpress avec le DSFR pour Conseiller numérique France Services

## Description

Thème créé from scratch pour le dispositif CnFS : https://media.conseiller-numerique.gouv.fr/ incluant les fichiers/dossiers nécessaires pour le DSFR v1.5.1

## Récupération du thème

Dans son wordpress local, se diriger dans le dossier wp-content\themes et cloner le repository
Par exemple: `git clone git@github.com:anct-cnum/wp-theme-conseiller-numerique.git cnfs`

## Installation du thème en tant que dépendance

Nous avons un repository Wordpress pour son déploiement en tant qu'image vers Clever Cloud basé sur https://github.com/roots/bedrock
Pour ajouter le thème dans le composer.json : 
1. Ajouter dans la partie `Repository` : 
`"type": "vcs", "url": "git@github.com:anct-cnum/wp-theme-conseiller-numerique"`
2. Ajouter dans la partie `require`:
`"anct-cnum/wp-theme-conseiller-numerique": "XXX"` avec XXX correspondant au tag souhaité
Important : le nom de la dépendance correspond au "name" du composer.json du thème
3. Configurer dans la partie `extra` => `installer-paths` :
`"web/app/themes/{$name}/": ["type:wordpress-theme"]`
Important : le type doit correspondre au "type" du composer.json du thème sinon par défaut, le thème sera installé dans le dossier vendors

Rappel: pour créer un nouveau tag avec git :
> git tag -a XXX -m "tag de test" avec XXX une version (par exemple 1.0.0)<br/>
> git push --tags<br/>

## Lint

Une fois le thème récupéré, un `npm install` et un `composer install` permettra d'installer les dépendances dev pour eslint : 
> - Composer lint (pour phpcs).<br/>
>   Note : Le fichier phpcs.xml permet de personnaliser certaines directives<br/>
> - npm lint:css (pour eslint sur style.css)<br/>

## Composition de la partie front 

- Header & menu
- Partie de bienvenue composée d'un titre, d'une baseline, d'une citation + la liste des filtres par thème (= catégories associées à un article) et par type de média (= étiquettes associées à un article)
Note : Seul les filtres associés à au moins un article publié sont affichés (comportement de Wordpress) - pas de multi-sélection
- Publication mise en avant (celle dont la date de publication est la + récente) avec l'image mise en avant + filtres + date + durée de la première vidéo si présente (vidéo uploadée ou url youtube intégrée) + titre + début du contenu
- Autres publications du plus récent au moins récent avec image mise en avant + filtres + date + durée de la première vidéo si présente (vidéo uploadé ou url youtube intégrée) + titre + début du contenu
- Pagination (en fonction du paramètre "Les pages du site doivent afficher au plus" - 10 par défaut)
- Encart de redirection vers le site vitrine CnFS ou sur la cartographie des CnFS
- Footer

## Composition dans le code

- Le point d'entrée est le fichier index.js (charge les différentes parties à afficher : header, footer, pagination, constantes et soit la liste des articles soit un article spécifique sélectionné)
- Les fonctions se trouvent dans le fichier functions.php (fonctions de Wordpress ou custom)
- Le fichier screenshot.png est l'image qui s'affichera dans la liste des thèmes disponibles dans Wordpress
- Le fichier style.css pour les styles custom
Important : le numéro de version qui se trouve en haut dans la partie commentaire permet d'indiquer un nouveau numéro de version au fichier et éviter des soucis de cache après modification de ce fichier (Wordpress renommera le fichier css chargé avec la version spécifique - voir wp_register_style dans le fichier header.php)
- header.php pour la partie header (on retrouve notamment les fichiers styles enregistrés)
- footer.php pour la partie footer (on retrouve notamment les fichiers js du DSFR chargés)
- Les dossiers/fichiers relatifs au DSFR (fonts / icons / utility / dsfr.min.css / dsfr.module.min.js / dsfr.nomodule.min.js)
- Dossier template-parts : les templates pour l'article mis en avant, les autres articles et l'affichage d'un article en entier
- Dossier components : 
> - consts.php : déclaration des constantes utilisées.<br/>
A noter: il y a une constante qui prend la variable d'environnement configurée ; 'GOOGLE_API_KEY'. Cette clé permet de récupérer la durée d'une vidéo youtube si un lien est inséré dans un article<br/>
> - categories.php : affiche la liste des filtres par type de média + filtre "Tous les articles" qui est le filtre par défaut<br/>
> - tags.php : affiche la liste des filtres par thématique<br/>
> - pagination.php : affichage de la pagination en modifiant/ajoutant les classes du DSFR à la pagination de Wordpress gérée nativement<br/>
> - help.php : encart fixe de redirection sur le site vitrine CnFS ou sur la cartographie CnFS<br/>
> - menu.php : affichage du menu inclus dans le header<br/>
> - welcome-part : Partie de bienvenue composé notamment des tags.php & categories.php<br/>

## Evolutions possibles à venir 

- Passage en sass (actuellement style.css et du style inline restant)
- Utilisation de la directive --standard=WordPress pour phpcs (indentation & noms de variable surtout)

## Licence

Voir le fichier [LICENSE](./LICENSE.md)
