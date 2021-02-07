`php artisan` : execute la commande localement

`sail artisan`: execute la commande dans Laravel Sail (dans notre conteneur)

# Migration
## Création d'une base de données
1. Model + Migration : `sail artisan make:model PotiAnimauxType --migration`
   - Model `PotiAnimauxType.php` dans `app/Models`
   - Migration `2021_02_06_200141_create_poti_animals_types_table.php` dans `app/database/migrations`

2. Ajouter les champs de la table dans la migration
	- champ `name` : `$table->string("name");`
    	- nouvelle table :
		```php
		Schema::create('poti_animals_type', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
        ```
3. Model + Migration : `sail artisan make:model PotiAnimal --migration`
   - Model `PotiAnimaux.php` dans `app/Models`
   - Migration `2021_02_06_194652_create_poti_animalses_table.php` dans `app/database/migrations`
4. Changer le nom de la table `poti_animaules` en `poti_animals`
5. Ajouter les champs de la table dans la migration
   - champ `name` : `$table->string("name");`
   - pour ajouter le type on ajoute le champ `type_id` une foreign key
     - foreign key : 
        ```php
            $table->bigInteger('types_id')->unsigned();
			$table->foreign('type_id')
					->references('id')
					->on('poti_animals_types');
		});
        ```

6. Lancer la création des BDD: 
    - `sail artisan migrate` : migre les dernières migrations
	- `sail artisan migrate:fresh` **ATTENTION** : le contenu de toutes les BDD sera écrasé
	- `sail artisan migrate database/migrations/2021_02_06_200141_create_poti_animals_types_table.php` pour migrer une BDD en particulier.

# Populer la bdd
1. Création de la Factory : `sail artisan make:factory PotiAnimauxTypeFactory`
2. Dans la fonction définition ajouter une valeur aléatoire à chaque champs qui doit être rempli
	```php
    return [
        'name' => $this->faker->name,
    ];
    ```
3. Créer le Seeder : `sail artisan make:seeder PotiAnimauxTypeSeeder`
4. Dans `run` on créer 50 insertions : `PotiAnimauxType::factory()->count(50)->create();`
5. Ajouter le `PotiAnimauxTypeSeeder` dans `DatabaseSeeder.php`
```php
$this->call([
    PotiAnimauxTypeSeeder::class,
]);
```
1. Répeter les étapes 1 à 5 pour `PotiAnimal`
2. Dans la factory faire appel à la factory du `PotiAnimauxType` pour le type
```php
return [
    'name' => $this->faker->name,
    'types_id' => PotiAnimauxType::factory()
];
```
8. Ajouter le `PotiAnimalSeeder` dans `DatabaseSeeder.php`
```php
$this->call([
    PotiAnimauxTypeSeeder::class,
    PotiAnimalSeeder::class,
]);
```
9. Populer la BDD
```sh
sail artisan migrate:fresh --seed
```

# Models
Les models sont la forme dans laquelle les données sont stockées. 
Les `Use` correspondent à des importations (les `#include` de C).
Les `namespace` permettent d'utiliser les fonctions/constantes qui se trouvent dans un autre package sans avoir à préciser sa localisation.

## Définition de la classe
Dans une classe, on ne code que les méthodes qui manipulent un objet (ici, on ne gère pas les relations avec d'autres classes).
1. La classe a déjà été créé grâce aux commandes précédentes.
2. Renseigner les variables nécessaires pour paramétrer la classe (certaines variables comme `$table` doivent être renseignées si certaines conditions ne sont pas remplies, pour `$table`, on lui affecte le nom de la BDD dans laquelle il est utilisé si les conventions de nommage ne sont pas remplis). Cliquez [ici](https://laravel.com/docs/8.x/eloquent) pour découvrir la liste de ces variables. **De nombreuses erreurs viennent de ce genre de variables non redéfinies**
	Pour pouvoir agir sur une variable, on définie la variable :
	```php
		protected $guarded = ["variable_non_assignable_par_le_codeur"];
	```
4. Implémenter les méthodes qui nous intéressent (dans le cas du site des poti-animaux, la classe `PotiAnimal` possedera une méthode `type`).
   - choissisez le type de relation [cf doc Laravel relation](https://laravel.com/docs/8.x/eloquent-relationships) : **belongsTo**
  
    ```php
    public function type()
    {
        return $this->belongsTo(PotiAnimauxType::class);
    }
    ```

**N'oubliez pas de commenter votre code**


## Routes
Lister toutes les routes
```sh
sail artisan route:list
```

1. Se rendre dans le dossier `routes` et ouvrir le fichier `web.php`.
2. On y renseigne les routes :
	- `Route::get` : méthode d'accès classique (via uri), peut être associée à la méthode `delete`
	- `Route::post` : méthode utilisée lorsque des informations renseignées par l'utilisateur doivent être sauvegardé (souvent associée à la méthode `create`).
	- `Route::put` : méthode utilisée loque les informations renseignées par l'utilisateur doivent modifier des données (souvent associée à la méthode `update`).
4. On ajoute une ressource `Route::resource('poti-animal', 'PotiAnimalController');` qui contient toutes les routes nécessaires:
	```php
	Route::resources(['poti-animals' => PotiAnimalController::class]);
	```
	Si vous n'utilisez pas toutes les routes, vous pouvez utiliser `only` ou `except` en suivant [ces indications](https://laravel.com/docs/8.x/controllers)

```
| Method    | Path                            | Name                 | Action                                            | Middleware |
+-----------+---------------------------------+----------------------+---------------------------------------------------+------------+
| GET|HEAD  | poti-animals                    | poti-animals.index   | App\Http\Controllers\PotiAnimalController@index   | web        |
| POST      | poti-animals                    | poti-animals.store   | App\Http\Controllers\PotiAnimalController@store   | web        |
| GET|HEAD  | poti-animals/create             | poti-animals.create  | App\Http\Controllers\PotiAnimalController@create  | web        |
| GET|HEAD  | poti-animals/{poti_animal}      | poti-animals.show    | App\Http\Controllers\PotiAnimalController@show    | web        |
| PUT|PATCH | poti-animals/{poti_animal}      | poti-animals.update  | App\Http\Controllers\PotiAnimalController@update  | web        |
| DELETE    | poti-animals/{poti_animal}      | poti-animals.destroy | App\Http\Controllers\PotiAnimalController@destroy | web        |
| GET|HEAD  | poti-animals/{poti_animal}/edit | poti-animals.edit    | App\Http\Controllers\PotiAnimalController@edit    | web        |
+-----------+---------------------------------+----------------------+---------------------------------------------------+------------+
```
**Attention à l'ordre des routes !** C'est le premier match qui sera utilisé !

## Controller
Les controllers servent de liens entre les vues et les modèles. Ils manipulent les modèles pour transmettre des informations à la vue
1. Creer un controlleur : `sail artisan make:controller PotiAnimalController -m PotiAnimal`
2. Implémenter les méthodes nécessaires (penser au CRUD). Même si vous ne vous servez pas de toutes ces fonctionnalités, de futurs développeurs le pourraient. Nous vous conseillons donc de les implémenter.
	Les fonctions les plus courantes sont :
	- `index` : retourne la vue qui liste les éléments.
	- `create` : retourne la vue qui permet à l'utilisateur de créer un élément.
	- `store` : enregistre un nouvel élément dans la BDD et redirige l'utilisateur.
	- `show` : affiche la page d'un élément.
	- `edit` : retourne la vue qui permet à l'utilisateur de modifier un élément.
	- `update` : modifie un élément dans la BDD et redirige l'utilisateur.
	- `destroy` : supprime un élément de la BDD et redirige l'utilisateur.
3. Refactorisation de la validation en une fonction

=> Il est essentiel de vérifier la validité des données renseignée par l'utilisateur afin de garder des données valides et cohérente.


# Search

# Frontend
## Template
1. Layout master
   - mettre les différentes sections avec `@yield('nom_section')`. Le code sera "copié collé".
   - toutes les ressources du dossier `public` sont accessibles via `{{ URL::asset('chemin/vers/le/fichier') }}`.

## View
**N'oubliez pas de commenter votre code !** Naviguer dans du code HTML devient
très vite très compliqué !

1. Indiquer le template utilisé grâce à `@extends('chemin.vers.le.layout')` (avec des `.` et non des `/`).
2. Définir ce que doivent contenir les différentes sections du layout avec :
```php
@section('page-title', 'Les poti-animaux')
```
```php
@section('content')

**ATTENTION** Ici, une balise en trop peut tout casser !! Vérifier bien vos indentations !!

// Code de la page

@endsection
```
Si vous ne remplissez pas une section, elle sera considérée comme étant vide.
3. On change dans `web.php` la route racine `/` : on redirige vers la liste des poti-animaux.
```php
Route::get('/', function () {
    return redirect()->route('poti-animals.index');
});
```
4. Ajouter le code dans les différentes vues

## Blade Template
Pour remplacer du code php par sa valeur : `{{ $var }}` ou `{{ fonction(...) }}`

```php
@foreach($liste as $elt)
	//mon code qui peut utiliser $elt
	//l'index est accessible via $loop->index
@endforeach

@forelse($liste as $elt)
	//mon code qui peut utiliser $elt
@empty
	//mon code si la liste est vide
@endforelse

@empty($liste)
	//mon code si ma liste est vide				
@endempty

@if ($maCondition)
	//mon code
@else
	//mon code 2
@endif


@while ($maCond2)
	//mon code
@endwhile


@for ($i = $begin; $i < $end; $i++)
	//mon code qui peut utiliser $i
@endwhile


@can ('action', monAction::class)
	//mon code
@endcan


@isset($maVar)
	
@endisset


@error($var)
	//
@enderror


@guest()
	//
@else
	//
@endguest


@auth()
	//
@else
	//
@endauth
```
La variable `$loop` permet d'avoir accès à de nombreuses informations, vous les retrouverez [ici](https://laravel.com/docs/8.x/blade#the-loop-variable).

Ces commandes sont utilisables à l'intérieur des balises !
```php
<h1 class="@if({{ user->fonction == 'président' }} president @endif">
</h1>
```

## Les formulaires
1. Définir quelle route recevra les données envoyées.
2. Mettre `@csrf` pour sécuriser l'envoie
3. Spécifier la méthode pour le formulaire :
   - `@method(PUT)` : mise à jour
   - `@method(DELETE)` : suppression

## Authentification
```sh
sail composer require laravel/ui
sail artisan ui vue --auth
npm install && npm run dev
```

- modifier le layout utiliser dans les vues d'authentification
- supprimer `ressources/views/layouts/app.blade.php`