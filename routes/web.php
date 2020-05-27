<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view("auth.login");
})->middleware("guest");

Auth::routes([
    'register' => false
]);
Route::get('logout', 'Auth\LoginController@logout');
/* Routes du middleware d'authentification */
Route::middleware("auth")->group(function (){

    /* Routes du middleware de l'admin */
    Route::middleware('role:admin')->group(function (){

        /*Admin Home page */
        Route::get('/home/admin', 'HomeController@adminIndex')->name('home.admin');

        /* Controller des caissiers */
        Route::resource('/cashiers', 'Resources\CashiersController')
            ->name("index","cashiers.index")
            ->name("show","cashiers.show")
            ->name("create","cashiers.create")
            ->name("store","cashiers.store")
            ->name("edit","cashiers.edit")
            ->name("update","cashiers.update")
            ->name("destroy","cashiers.destroy");

        /* Controller des fournisseurs */
        Route::resource('/providers', 'Resources\ProvidersController')
            ->name("index","providers.index")
            ->name("show","providers.show")
            ->name("create","providers.create")
            ->name("store","providers.store")
            ->name("edit","providers.edit")
            ->name("update","providers.update")
            ->name("destroy","providers.destroy");

        /* Controller des approvisionements */
        Route::resource('/supplies', 'Resources\SuppliesController')
            ->name("index","supplies.index")
            ->name("show","supplies.show")
            ->name("create","supplies.create")
            ->name("store","supplies.store")
            ->name("edit","supplies.edit")
            ->name("update","supplies.update")
            ->name("destroy","supplies.destroy");

        /* Route pour confirmer un approvisionement */
        Route::get("/supplies/{id}/confirm","Resources\SuppliesController@confirm")
            ->name("supplies.confirmed");

        /* Controller des approvisionements */
        Route::resource('/products', 'Resources\ProductsController')
            ->name("index","products.index")
            ->name("show","products.show")
            ->name("create","products.create")
            ->name("store","products.store")
            ->name("edit","products.edit")
            ->name("update","products.update")
            ->name("destroy","products.destroy");
    });

    /* Routes des roles casssier et admin */
    Route::middleware('role:admin,cashier')->group(function (){
        /* Cashier Home page */
        Route::get('/home/cashier', 'HomeController@cashierIndex')->name('home.cashier');

        # Routes des ventes en sessions
        Route::get('/card_sales', 'Resources\SalesController@index')->name("sales.index"); # sales list
        Route::get('/card_sales/create', 'Resources\SalesController@create')->name("sales.create"); # Add new sales in  session card
        Route::post('/card_sales', 'Resources\SalesController@store')->name("sales.store"); # Strore new sale in session card
        Route::delete('/card_sales/{sale_key}', 'Resources\SalesController@destroy')->name("sales.destroy"); # Remove sales in session card
        Route::delete('/card_sales/delete/all', 'Resources\SalesController@destroyAll')->name("sales.destroy_all"); # Remove all sales in session card

        # Route des ventes en Base de données
        Route::resource('/app_sales',"Resources\AppSalesController")
            ->name("index","app_sales.index") # Liste des ventes
            ->name("store","app_sales.store") # Enregistrer des ventes depuis les sessions
            ->only("index","store");
        Route::get("/app_sales/print/{cashier}","Resources\AppSalesController@print")->name("app_sales.print");

        Route::get("notification","NotificationController@list")->name("notification_list");
    });

});
