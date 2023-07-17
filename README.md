# ECF-Studi2023 - Guide d'installation

## Étape 1: Installation de MAMP

- Téléchargez et installez la version 5.0.5 de MAMP depuis le site officiel : [https://www.mamp.info/en/downloads/](https://www.mamp.info/en/downloads/)
- Ouvrez MAMP
- Dans les préférences, sélectionnez la version de PHP 8.0.1
- Configurez le serveur Apache pour qu'il pointe vers le répertoire `C:\MAMP\htdocs`
- Récupérez le fichier `php.ini` depuis mon référentiel GitHub pour remplacer le fichier existant dans `C:\MAMP\bin\php\php8.0.1`

## Étape 2: Installation de MySQL Workbench

- Téléchargez et installez MySQL Workbench 8.0.33 (ou tout autre logiciel de gestion de base de données) depuis le site officiel : [https://dev.mysql.com/downloads/workbench/](https://dev.mysql.com/downloads/workbench/)
- Sélectionnez votre système d'exploitation : Microsoft Windows
- Sur ma page GitHub ([https://github.com/Erwan-LM/ECF-Studi2023/tree/master](https://github.com/Erwan-LM/ECF-Studi2023/tree/master)), ouvrez le fichier `BD.sql`
- Exécutez les requêtes SQL une par une dans MySQL Workbench en utilisant l'icône d'exécution (éclair)

## Étape 3: Installation de Visual Studio Code

- Téléchargez et installez la version Windows 8, 10 ou 11 de Visual Studio Code depuis le site officiel : [https://code.visualstudio.com/download](https://code.visualstudio.com/download)
- Ouvrez Visual Studio Code
- Sur ma page GitHub ([https://github.com/Erwan-LM/ECF-Studi2023/tree/master](https://github.com/Erwan-LM/ECF-Studi2023/tree/master)), cliquez sur le bouton vert "Code" en haut à droite de la page du référentiel. Cela ouvrira un menu déroulant.
- Dans le menu déroulant, vous avez différentes options pour cloner le référentiel. Utilisez HTTPS et cliquez sur l'icône du presse-papiers à droite pour copier l'URL du référentiel.
- Naviguez jusqu'au répertoire `C:\MAMP\htdocs` en utilisant la commande `cd`.
- Une fois dans le répertoire de destination, utilisez la commande `git clone https://github.com/Erwan-LM/ECF-Studi2023.git`
- Attendez que le processus de clonage soit terminé. Une fois terminé, vous verrez un message indiquant que le clonage est réussi.
- Vous avez maintenant importé avec succès le code du référentiel GitHub sur votre ordinateur. Vous pouvez accéder au répertoire cloné et travailler avec les fichiers et le code localement.

## Étape 4: Configuration de la base de données

- Pour vous connecter à la base de données du projet, consultez le fichier `config.php` dans le dossier `includes`. Des valeurs par défaut y sont déjà définies.
- Vous avez accès à un compte administrateur et à deux comptes employés, mais les mots de passe sont hachés.
- Voici le mot de passe administrateur par défaut qui vous permettra d'accéder plus tard à la version administrateur et à la page `admin.php` de l'application : `p@$$word` (vous pouvez le modifier dans la base de données et le hacher ici : [https://phppasswordhash.com/](https://phppasswordhash.com/))
- Voici le mot de passe employé par défaut utilisé pour les deux comptes employés créés par l'administrateur : `password1` (vous pouvez le modifier dans la base de données et le hacher ici : [https://phppasswordhash.com/](https://phppasswordhash.com/))

## Étape 5: Accéder à l'application

- Ouvrez un navigateur et saisissez l'URL `localhost` pour accéder à l'application.

 
