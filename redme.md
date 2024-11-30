# Contexte

Vous devez construire un site web qui permet de gérer un zoo. Le site doit permettre la gestion des animaux, et des enclos qui contiennent les animaux.

# Objectifs

- Créer un MCD (Model Conceptuel de Données) et joindre un screenshot à la racine du projet (JMERISE par exemple)
- Créer une page d'accueil
- Faire un premier commit git au début du projet, et au moins un deuxieme à la fin du projet, puis push le travail sur github

## sur la page d'accueil :

- Créer un formulaire de création d'enclos
- Créer une page de gestion des enclos (affichage, modification, suppression)
- Cliquer sur un enclos pour afficher les animaux qu'il contient

## dans un enclos :

- Créer un formulaire de création d'animaux
- Créer une page de gestion des animaux (affichage, modification, suppression)

# Data

### Enclos :

| id (clé primaires) | nom | description | created_at |

### Animaux :

| id (clé primaires) | nom | description | espece | created_at | enclos_id (clé étrangère) |

# infos :

- Les datas fourni sont celles fourni par votre client, c'est à vous d'imaginer les ou la potentiel table manquantes avec les clés primaires et clés étrangers.
