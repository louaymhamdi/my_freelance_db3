
# **Plateforme Freelance**

## **Description du projet**

La plateforme Freelance est une application web qui met en relation des **recruteurs** et des **freelances**. 
Elle permet aux recruteurs de publier des projets, de recevoir des offres de freelances, de gérer les projets, 
d'échanger via une messagerie intégrée, et d'envoyer des notifications.

Le projet utilise **PHP**, une architecture **MVC**, et une base de données **PostgreSQL** pour assurer une séparation claire entre les données, la logique métier et la présentation.

---

## **Fonctionnalités principales**

- **Gestion des utilisateurs** : Inscription et connexion pour les recruteurs et freelances.
- **Création de projets** : Les recruteurs peuvent publier des projets avec un budget, une description et une deadline.
- **Envoi d'offres** : Les freelances peuvent soumettre des propositions pour des projets.
- **Système de messagerie** : Communication bidirectionnelle entre recruteurs et freelances, avec réponses en thread.
- **Embauche de freelances** : Les recruteurs peuvent embaucher un freelance pour un projet spécifique.
- **Notifications** : Notifications en temps réel pour les offres et embauches.
- **Interface utilisateur dynamique** : Intégration de CSS pour une expérience utilisateur fluide et attrayante.

---

## **Prérequis techniques**

Pour exécuter ce projet, vous aurez besoin de :

1. **Serveur web** :
   - **WAMP**, **XAMPP** ou **Laragon** pour Windows.
   - **MAMP** pour macOS.
   - **LAMP** pour Linux.

2. **PHP** : Version 7.4 ou supérieure.

3. **PostgreSQL** : Base de données relationnelle.

4. **Composer** : Gestionnaire de dépendances pour PHP.

5. **Navigateur moderne** : Chrome, Firefox, ou Edge.

---

## **Structure du projet**

```
my_freelance_project/
├── public/
│   ├── css/
│   │   └── style.css       # Fichier CSS principal
│   └── index.php           # Front controller
├── src/
│   ├── Controller/
│   │   ├── UserController.php
│   │   ├── ProjectController.php
│   │   ├── MessageController.php
│   │   └── NotificationController.php
│   ├── Model/
│   │   ├── UserModel.php
│   │   ├── ProjectModel.php
│   │   ├── MessageModel.php
│   │   └── NotificationModel.php
│   └── View/
│       ├── partials/
│       │   └── navbar.php
│       ├── layout.php
│       ├── home.php
│       ├── project_list.php
│       ├── project_create.php
│       ├── my_projects.php
│       ├── view_messages.php
│       └── notification_list.php
├── vendor/                 # Dépendances installées via Composer
├── composer.json           # Configuration Composer
└── README.md               # Documentation du projet
```

---

## **Installation**

### **Étape 1 : Cloner le dépôt**

Clonez le projet depuis le dépôt Git :
```bash
git clone https://github.com/louaymhamdi_freelance_project.git
cd my_freelance_project
```

### **Étape 2 : Installer les dépendances**
Utilisez Composer pour installer les dépendances nécessaires :
```bash
composer install
```

### **Étape 3 : Configurer la base de données**
1. **Créer la base de données** :
   - Connectez-vous à PostgreSQL via `pgAdmin` ou un terminal.
   - Créez une base de données, par exemple `my_freelance_db`.

2. **Importer le fichier SQL** :
   - Importez le fichier `freelance_project.sql` :
     ```bash
     psql -U votre_utilisateur -d my_freelance_db -f freelance_project.sql
     ```

3. **Configurer la connexion à la base de données** :
   - Modifiez le fichier `src/Config/Database.php` :
     ```php
     private static $dbHost = 'localhost';
     private static $dbName = 'my_freelance_db';
     private static $dbUser = 'votre_utilisateur';
     private static $dbPass = 'votre_mot_de_passe';
     ```

### **Étape 4 : Lancer le serveur**
1. **Via PHP intégré** :
   ```bash
   php -S localhost:8000 -t public/
   ```
2. Accédez à l'application sur :  
   [http://localhost:8000](http://localhost:8000)

---

## **Utilisation**

### **1. Inscription et connexion**
- Les utilisateurs peuvent s'inscrire comme **recruteurs** ou **freelances**.
- Les recruteurs peuvent publier des projets et embaucher des freelances.
- Les freelances peuvent consulter les projets ouverts et soumettre des propositions.

### **2. Fonctionnalités principales**
- **Recruteur** :
  - Publier un projet.
  - Consulter les projets créés.
  - Embaucher un freelance pour un projet.
- **Freelance** :
  - Explorer les projets ouverts.
  - Soumettre une offre pour un projet.
- **Tous les utilisateurs** :
  - Envoyer et répondre à des messages.
  - Recevoir des notifications en temps réel.

---

## **Collaboration**

### **Étapes pour contribuer**
1. **Forker le dépôt** :
   - Cliquez sur "Fork" dans GitHub.

2. **Créer une branche** :
   ```bash
   git checkout -b feature/nouvelle-fonctionnalite
   ```

3. **Effectuer des modifications** :
   - Ajoutez des fonctionnalités ou corrigez des bugs.

4. **Soumettre vos modifications** :
   ```bash
   git add .
   git commit -m "Ajout de la fonctionnalité X"
   git push origin feature/nouvelle-fonctionnalite
   ```

5. **Créer une Pull Request** :
   - Depuis GitHub, ouvrez une Pull Request pour examiner vos modifications.

---

## **Fonctionnalités futures**

- **Système de paiement** : Intégration avec Stripe ou PayPal.
- **Notation et avis** : Permettre aux recruteurs de noter les freelances.
- **Notifications en temps réel** : Utilisation de WebSockets pour des mises à jour instantanées.
- **Recherche avancée** : Filtrer les projets par budget, deadline ou mots-clés.



