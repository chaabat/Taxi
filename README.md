# MonGrandTaxi - Plateforme de Réservation de Grands Taxis

La société MonGrandTaxi souhaite développer une plateforme de réservation de grands taxis, permettant aux utilisateurs de trouver des chauffeurs disponibles pour des trajets spécifiques, et aux chauffeurs de publier leurs disponibilités.

Ce projet est développé en utilisant le framework Laravel.

## Fonctionnalités Requises:

### Authentification et Autorisation:

- Mise en place d'un système d'authentification avec des rôles (Passager standard, Chauffeur de taxi et Administrateur).
- Utilisation de politiques et de gardes pour régir l'accès aux profils et aux fonctionnalités spécifiques en fonction du rôle de l'utilisateur.
- Les utilisateurs peuvent s'inscrire en tant que passagers ou chauffeurs, et se connecter avec leurs identifiants uniques.

### Utilisateurs et Réservations:

- Un utilisateur possède un nom, une photo de profil, un historique de trajets, et des informations de contact.
- Les passagers peuvent réserver des taxis pour des trajets spécifiques, en indiquant le jour, le lieu de prise en charge, et la destination.
- Les chauffeurs peuvent définir leurs disponibilités, afficher les réservations acceptées, et indiquer leur statut actuel (disponible, en cours de trajet, etc.).
- Les passagers peuvent visualiser l'historique de leurs réservations et noter les chauffeurs après chaque trajet.
- Un utilisateur peut annuler une réservation dans un délai spécifié.
- Un passager peut filtrer un taxi disponible en fonction de la localisation, du type de véhicule, et des évaluations des chauffeurs.

### Chauffeurs et Gestion des Taxis:

- Un chauffeur possède un nom, une photo de profil, une description, un numéro de plaque d'immatriculation, et un type de véhicule.
- Un chauffeur peut mettre à jour ses disponibilités.
- Un chauffeur peut visualiser son historique de trajets et les évaluations reçues.
- Un chauffeur peut spécifier le type de paiement qu'il accepte (espèces, carte, etc.).
- Un chauffeur doit sélectionner son trajet.

### Administration et Gestion des Utilisateurs:

- Les administrateurs ont la possibilité de gérer les passagers, les chauffeurs, et les réservations (soft delete).
- Les administrateurs ont la possibilité de visualiser les statistiques liées aux trajets, aux réservations, et aux évaluations.  

## Technologies Utilisées:

- Laravel (PHP)
- JavaScript
- HTML5
- CSS (avec un framework  Tailwind CSS)

## Installation:

1. Cloner le répertoire du projet depuis le dépôt Git de MonGrandTaxi.
2. Importer la base de données fournie dans le fichier SQL.
3. Configurer la connexion à la base de données dans le fichier d'environnement `.env`.
4. Installer les dépendances PHP en exécutant `composer install`.
5. Générer une clé d'application Laravel en exécutant `php artisan key:generate`.
6. Lancer l'application en exécutant `php artisan serve`.

## Contribution:

Les contributions visant à améliorer les fonctionnalités, la sécurité et l'accessibilité de la plateforme sont les bienvenues. Veuillez suivre les normes et directives de codage établies et ouvrir une nouvelle demande de fusion pour toute modification proposée.

## Licence:

Ce projet est sous licence [MIT](LICENSE.md). Vous êtes libre d'utiliser, modifier et distribuer le code conformément aux termes de la licence.

## Auteur:

Ce projet est développé par [AYOUB CHAABAT] pour MonGrandTaxi.
