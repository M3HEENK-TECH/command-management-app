
<p align="center"><img src="https://avatars0.githubusercontent.com/u/45993282?s=200&v=4" width="400"></p>

![Command Management App](https://github.com/M3HEENK-TECH/command-management-app/workflows/Laravel/badge.svg) 


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
* Taper: php artisan route:list

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

### Envoie d'email
* email : esigalerte@gmail.com
* pass : #aHes1fZ 
