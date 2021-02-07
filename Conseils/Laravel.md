# New Laravel Application
`curl -s https://laravel.build/example-app | bash`

# Laravel Application
## Installer Sail Into Existing Applications - Recupération d'un projet
- `composer require laravel/sail --dev` (long)

## Génération de la clé 
`sail artisan key:generate`

## .env
- Copier le `.env.example` pour créer votre `.env`
- `sail composer require laravel/ui`
- `npm install && npm run dev`

## Migration des tables de bdd
`sail artisan migrate:fresh --seed`

# Alias sail dans une fenêtre du terminal
`alias sail='bash vendor/bin/sail'`

# Lancer l'application
- Si pas d'alias : `./vendor/bin/sail up` (long la première fois)
- Start les conteneurs : `sail up -d`
- Stop les conteneurs : `sail down`

# Preview
- Website : `http://localhost`
- PhpMyAdmin : `http://localhost:8181`
- MailHog : `http://localhost:8025`



# Les conventions utilisées

#### Pour passer des arguments à une vue

On utilise `compact`.

#### Pour les routes

On utilise `resources` plutôt que de redéfinir chaque route.

#### Pour les chemins des vues

On utilise le "chemin pointé" (qui est en réalité le nom de la vue)

#### L'utilisation de {{ .. }}

On met des espaces autour du contenu pour plus de clareté.
