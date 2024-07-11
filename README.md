# PHP-Procedural

![PHP Version](https://img.shields.io/badge/PHP-%3E%3D%207.4-8892BF?style=flat-square)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

Bienvenue dans le dépôt **PHP-Procedural** ! Ce projet contient divers exercices en PHP procédural pour vous aider à pratiquer et à améliorer vos compétences en programmation PHP. Vous y trouverez des exemples de scripts, des mini-projets et des solutions à des problèmes courants.

## Table des matières

- [Prérequis](#prérequis)
- [Installation](#installation)
  - [Cloner le dépôt](#cloner-le-dépôt)
  - [Installer un serveur local](#installer-un-serveur-local)
  - [Configuration de la base de données](#configuration-de-la-base-de-données)
  - [Configuration des paramètres de connexion](#configuration-des-paramètres-de-connexion)
  - [Exécution des exercices](#exécution-des-exercices)
- [Contribuer](#contribuer)
- [Licence](#licence)

## Prérequis

Avant de commencer, assurez-vous d'avoir un serveur local installé sur votre machine. Vous pouvez utiliser l'un des serveurs suivants :

- **MAMP** (pour macOS et Windows)
- **XAMPP** (pour Windows, macOS et Linux)
- **LAMP** (pour Linux)

## Installation

Suivez ces étapes pour installer et exécuter les exercices en PHP procédural :

### Cloner le dépôt

Clonez ce dépôt sur votre machine locale en utilisant la commande suivante :

```bash
git clone https://github.com/nath121/PHP-Procedural.git

### Installer un serveur local

Vous devez installer Apache, MySQL et PHP. Voici des options selon votre système d'exploitation :

#### Utilisation de MAMP

- Téléchargez et installez [MAMP](https://www.mamp.info/en/).
- Placez le dossier cloné dans le répertoire `MAMP/htdocs`.

#### Utilisation de XAMPP

- Téléchargez et installez [XAMPP](https://www.apachefriends.org/index.html).
- Placez le dossier cloné dans le répertoire `XAMPP/htdocs`.

#### Utilisation de LAMP

- Installez Apache, MySQL et PHP sur votre distribution Linux. Suivez les instructions spécifiques à votre distribution (Ubuntu, Debian, etc.).
- Placez le dossier cloné dans le répertoire `/var/www/html`.

### Configuration de la base de données

1. Ouvrez votre navigateur et accédez à `http://localhost/phpmyadmin`.
2. Créez une nouvelle base de données pour les exercices en PHP.
3. Importez les fichiers SQL fournis dans le dépôt pour initialiser les tables nécessaires (si applicable).

### Configuration des paramètres de connexion

1. Ouvrez le fichier `config.php` (ou équivalent).
2. Configurez les paramètres de connexion à la base de données avec les informations appropriées (nom d'utilisateur, mot de passe, nom de la base de données).

### Exécution des exercices

1. Accédez à votre navigateur et entrez l'URL suivante pour voir la liste des exercices : `http://localhost/nom-du-dossier`
2. Remplacez `nom-du-dossier` par le nom du dossier où vous avez placé les fichiers clonés.

## Contribuer

Les contributions sont les bienvenues ! Vous pouvez ouvrir une issue ou soumettre une pull request.

## Licence

Ce projet est sous licence MIT.
