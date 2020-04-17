
![Command Management App](https://github.com/M3HEENK-TECH/command-management-app/workflows/Laravel/badge.svg) 

<p align="center"><img src="https://avatars0.githubusercontent.com/u/45993282?s=200&v=4" width="400"></p>

# command-management-app

# Notes

##  Faire une Push et pull

* Faire le push (Envoyer)
<pre>git init </pre>
<pre>git add README.md </pre>
<pre>git commit -m "first commit"</pre>
<pre>git remote add origin https://github.com/M3HEENK-TECH/command-management-app.git</pre>
<pre>git push -u origin beta</pre>

* ou uniquement 

<pre>git remote add origin https://github.com/M3HEENK-TECH/command-management-app.git</pre>
<pre>git push -u origin beta</pre>


* Faire une Pull (Récupérer)

<pre>git clone https://github.com/M3HEENK-TECH/command-management-app.git</pre>
- Ou
<pre>git pull -u origin master</pre>

## Model Physique  de la base de donnees
![Model de BD](https://raw.githubusercontent.com/M3HEENK-TECH/command-management-app/master/doc/db_model.png)

## Diagramme de cas d'utilisation
![Diagramme de cas d'utilisation](https://raw.githubusercontent.com/M3HEENK-TECH/command-management-app/master/doc/uc_diagram.jpg)

## Diagramme de classe
![Diagramme de classe](https://raw.githubusercontent.com/M3HEENK-TECH/command-management-app/master/doc/class_dirgram.jpg)


## Fichier SQL de la base de donnees
 * Fichier : doc/bd.sql

## Base  de donnees
* Creer la base de donnees et lancer les migration
<pre>
mysql -u root -p  -e "create database command_app2020"
</pre>
<pre>
php artisan migrate
</pre>

### Middlewares :
* Middleware des roles : RoleMiddleware

### Configuration des models :
* Ajout des proprietes $primaryKey, $table, $fillable
* Ajout des SoftDeletes, Norifiable
* Ajout des functions de relation entre tables: HasManyn BelongToMany ...


### Seeder la base de donnees :
* Commandes 
    `<pre> php artisan migrate:fresh --seed </pre>
* Comptes : 

|Email| Mot de passe|
|:--------|:----------|
|admin@gmail.com| password|
|stevy@gmail.com| password|

* Nombre d'enregistremenrts dans les tables 20 
* Fichier de seeding avec les Factories : **datbase/seeds/FactoriesSeeder**
* Fichier de seeding des utilisateurs : /**databse/seeds/UserTableSeeder**


### Route de l'application :

| Domain | Method    | URI                       | Name                 | Action                                                                 | Middleware                  |
| :------| :---------| :-------------------------|:---------------------|:-----------------------------------------------------------------------| :---------------------------|
|        | GET|HEAD  | /                         |                      | Closure                                                                | web,guest                   |
|        | GET|HEAD  | api/user                  |                      | Closure                                                                | api,auth:api                |
|        | GET|HEAD  | cashiers                  | cashiers.index       | App\Http\Controllers\Resources\CashiersController@index                | web,auth,role:admin         |
|        | POST      | cashiers                  | cashiers.store       | App\Http\Controllers\Resources\CashiersController@store                | web,auth,role:admin         |
|        | GET|HEAD  | cashiers/create           | cashiers.create      | App\Http\Controllers\Resources\CashiersController@create               | web,auth,role:admin         |
|        | DELETE    | cashiers/{cashier}        | cashiers.destroy     | App\Http\Controllers\Resources\CashiersController@destroy              | web,auth,role:admin         |
|        | PUT|PATCH | cashiers/{cashier}        | cashiers.update      | App\Http\Controllers\Resources\CashiersController@update               | web,auth,role:admin         |
|        | GET|HEAD  | cashiers/{cashier}        | cashiers.show        | App\Http\Controllers\Resources\CashiersController@show                 | web,auth,role:admin         |
|        | GET|HEAD  | cashiers/{cashier}/edit   | cashiers.edit        | App\Http\Controllers\Resources\CashiersController@edit                 | web,auth,role:admin         |
|        | GET|HEAD  | home/admin                | home.admin           | App\Http\Controllers\HomeController@adminIndex                         | web,auth,role:admin         |
|        | GET|HEAD  | home/cashier              | home.cashier         | App\Http\Controllers\HomeController@cashierIndex                       | web,auth,role:admin,cashier |
|        | GET|HEAD  | login                     | login                | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest                   |
|        | POST      | login                     |                      | App\Http\Controllers\Auth\LoginController@login                        | web,guest                   |
|        | POST      | logout                    | logout               | App\Http\Controllers\Auth\LoginController@logout                       | web                         |
|        | GET|HEAD  | notification              | notification_list    | App\Http\Controllers\NotificationController@list                       | web,auth,role:admin,cashier |
|        | POST      | password/email            | password.email       | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest                   |
|        | POST      | password/reset            | password.update      | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest                   |
|        | GET|HEAD  | password/reset            | password.request     | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest                   |
|        | GET|HEAD  | password/reset/{token}    | password.reset       | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest                   |
|        | POST      | products                  | products.store       | App\Http\Controllers\Resources\ProductsController@store                | web,auth,role:admin         |
|        | GET|HEAD  | products                  | products.index       | App\Http\Controllers\Resources\ProductsController@index                | web,auth,role:admin         |
|        | GET|HEAD  | products/create           | products.create      | App\Http\Controllers\Resources\ProductsController@create               | web,auth,role:admin         |
|        | DELETE    | products/{product}        | products.destroy     | App\Http\Controllers\Resources\ProductsController@destroy              | web,auth,role:admin         |
|        | PUT|PATCH | products/{product}        | products.update      | App\Http\Controllers\Resources\ProductsController@update               | web,auth,role:admin         |
|        | GET|HEAD  | products/{product}        | products.show        | App\Http\Controllers\Resources\ProductsController@show                 | web,auth,role:admin         |
|        | GET|HEAD  | products/{product}/edit   | products.edit        | App\Http\Controllers\Resources\ProductsController@edit                 | web,auth,role:admin         |
|        | GET|HEAD  | providers                 | providers.index      | App\Http\Controllers\Resources\ProvidersController@index               | web,auth,role:admin         |
|        | POST      | providers                 | providers.store      | App\Http\Controllers\Resources\ProvidersController@store               | web,auth,role:admin         |
|        | GET|HEAD  | providers/create          | providers.create     | App\Http\Controllers\Resources\ProvidersController@create              | web,auth,role:admin         |
|        | PUT|PATCH | providers/{provider}      | providers.update     | App\Http\Controllers\Resources\ProvidersController@update              | web,auth,role:admin         |
|        | GET|HEAD  | providers/{provider}      | providers.show       | App\Http\Controllers\Resources\ProvidersController@show                | web,auth,role:admin         |
|        | DELETE    | providers/{provider}      | providers.destroy    | App\Http\Controllers\Resources\ProvidersController@destroy             | web,auth,role:admin         |
|        | GET|HEAD  | providers/{provider}/edit | providers.edit       | App\Http\Controllers\Resources\ProvidersController@edit                | web,auth,role:admin         |
|        | GET|HEAD  | sales                     | sales.index          | App\Http\Controllers\Resources\SalesController@index                   | web,auth,role:admin,cashier |
|        | POST      | sales                     | sales.store          | App\Http\Controllers\Resources\SalesController@store                   | web,auth,role:admin,cashier |
|        | GET|HEAD  | sales/{sale}              | sales.show           | App\Http\Controllers\Resources\SalesController@show                    | web,auth,role:admin,cashier |
|        | POST      | supplies                  | supplies.store       | App\Http\Controllers\Resources\SuppliesController@store                | web,auth,role:admin         |
|        | GET|HEAD  | supplies                  | supplies.index       | App\Http\Controllers\Resources\SuppliesController@index                | web,auth,role:admin         |
|        | GET|HEAD  | supplies/create           | supplies.create      | App\Http\Controllers\Resources\SuppliesController@create               | web,auth,role:admin         |
|        | GET|HEAD  | supplies/soft-deletes     | supplies.SoftDeleted | App\Http\Controllers\Resources\SuppliesController@listWithSoftDeleted  | web,auth,role:admin         |
|        | POST      | supplies/{id}/confirm     | supplies.confirm     | App\Http\Controllers\Resources\SuppliesController@confirm              | web,auth,role:admin         |
|        | PUT|PATCH | supplies/{supply}         | supplies.update      | App\Http\Controllers\Resources\SuppliesController@update               | web,auth,role:admin         |
|        | GET|HEAD  | supplies/{supply}         | supplies.show        | App\Http\Controllers\Resources\SuppliesController@show                 | web,auth,role:admin         |
|        | DELETE    | supplies/{supply}         | supplies.destroy     | App\Http\Controllers\Resources\SuppliesController@destroy              | web,auth,role:admin         |
|        | GET|HEAD  | supplies/{supply}/edit    | supplies.edit        | App\Http\Controllers\Resources\SuppliesController@edit                 | web,auth,role:admin         |

## Taches :

#### Mise en places de la structure

#### Configuration des models

#### Seeding de la base de donnees

### Espace utilisateur
* Creation du middleware : RoleMiddleware
* Creation des routes d'espace utilisateur
* Creation des layout pour l'espace utilisateur
* Creation des vues pour l'espace utilisateur
    * /home/admin et /home/cashier
