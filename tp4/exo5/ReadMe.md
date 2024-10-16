## Description

Cette API permet de gérer des utilisateurs à travers des opérations CRUD (Create, Read, Update, Delete). Elle interagit avec une base de données pour ajouter, récupérer, mettre à jour et supprimer des utilisateurs.

## Endpoints

### 1. Récupérer tous les utilisateurs

- **URL** : `/users`
- **Méthode** : GET
- **Description** : Récupère la liste de tous les utilisateurs.
- **Réponse** :
  - **Code 200** : Liste des utilisateurs.
  - Exemple : 
    ```json
    [
      {"login": "jdoe", "email": "jdoe@example.com"},
      {"login": "asmith", "email": "asmith@example.com"}
    ]
    ```

### 2. Récupérer un utilisateur spécifique

- **URL** : `/users/{login}`
- **Méthode** : GET
- **Description** : Récupère les détails d'un utilisateur spécifique.
- **Paramètre** :
  - `login` (string) : Le login de l'utilisateur.
- **Réponse** :
  - **Code 200** : Détails de l'utilisateur.
  - **Code 400** : Si l'utilisateur n'existe pas.
  - Exemple :
    ```json
    {"login": "jdoe", "email": "jdoe@example.com"}
    ```

### 3. Ajouter un nouvel utilisateur

- **URL** : `/users`
- **Méthode** : POST
- **Description** : Ajoute un nouvel utilisateur.
- **Paramètres** :
  - `login` (string) : Le login de l'utilisateur.
  - `email` (string) : L'email de l'utilisateur.
- **Réponse** :
  - **Code 201** : Utilisateur ajouté avec succès.
  - **Code 400** : Si l'utilisateur existe déjà.

### 4. Supprimer un utilisateur

- **URL** : `/users/{login}`
- **Méthode** : DELETE
- **Description** : Supprime un utilisateur en fonction de son login.
- **Paramètre** :
  - `login` (string) : Le login de l'utilisateur.
- **Réponse** :
  - **Code 200** : Utilisateur supprimé avec succès.
  - **Code 400** : Si l'utilisateur n'existe pas.

### 5. Mettre à jour un utilisateur

- **URL** : `/users/{previous_login}`
- **Méthode** : PUT
- **Description** : Met à jour les informations d'un utilisateur existant.
- **Paramètres** :
  - `previous_login` (string) : Le login de l'utilisateur avant modification.
  - `login` (string) : Le nouveau login.
  - `email` (string) : Le nouvel email.
- **Réponse** :
  - **Code 200** : Utilisateur mis à jour avec succès.
  - **Code 400** : Si l'utilisateur n'existe pas.
