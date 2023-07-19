# ECF-Studi2023 - Guide d'installation

## Étape 1: Installation de MAMP

- Téléchargez et installez la version 5.0.5 de MAMP depuis le site officiel : [https://www.mamp.info/en/downloads/](https://www.mamp.info/en/downloads/)
- Ouvrez MAMP
- Dans les préférences, sélectionnez la version de PHP 8.0.1
- Configurez le serveur Apache pour qu'il pointe vers le répertoire `C:\MAMP\htdocs`
- Récupérez le fichier `php.ini` depuis mon référentiel GitHub pour remplacer le fichier existant dans `C:\MAMP\bin\php\php8.0.1`

## Étape 2: Installation de MySQL Workbench

- Téléchargez et installez MySQL Workbench 8.0.33 (ou tout autre logiciel de gestion de base de données) depuis le site officiel : [https://dev.mysql.com/downloads/workbench/](https://dev.mysql.com/downloads/workbench/)
- Sur ma page GitHub ([https://github.com/Erwan-LM/ECF-Studi2023/tree/main](https://github.com/Erwan-LM/ECF-Studi2023/tree/main)), ouvrez le fichier `BD.sql`
- Exécutez les requêtes SQL dans MySQL Workbench en utilisant l'icône d'exécution (éclair)
-  Sur ma page GitHub ([https://github.com/Erwan-LM/ECF-Studi2023/tree/main](https://github.com/Erwan-LM/ECF-Studi2023/tree/main)), récupérer le dépot et placer le dans le dossier de mamp > htdocs

## Étape 3: Configuration de la base de données

- Pour vous connecter à la base de données du projet, consultez le fichier `config.php` dans le dossier `includes`. Des valeurs par défaut y sont déjà définies.
- Vous avez accès à un compte administrateur et à deux comptes employés, mais les mots de passe sont hachés.
- Voici le mot de passe administrateur par défaut qui vous permettra d'accéder plus tard à la version administrateur et à la page `admin.php` de l'application : `p@$$word` (vous pouvez le modifier dans la base de données et le hacher ici : [https://phppasswordhash.com/](https://phppasswordhash.com/))
- Voici le mot de passe employé par défaut utilisé pour les deux comptes employés créés par l'administrateur : `password1` (vous pouvez le modifier dans la base de données et le hasher ici : [https://phppasswordhash.com/](https://phppasswordhash.com/))

## Étape 4: Accéder à l'application

- Ouvrez un navigateur et saisissez l'URL `localhost` pour accéder à l'application.

 
