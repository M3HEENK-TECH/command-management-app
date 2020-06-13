<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Cashier User Home Page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cashierIndex()
    {
        return view('homepages.cashier');
    }

    /**
     * Admin User Home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function AdminIndex()
    {
        $counts_data = [
            [
                'title' => 'Caissiers',
                'count' => null //User::query()->cashier()->count()
            ],
            [
                'title' => 'Adminisatrateurs',
                'count' => null //User::query()->admin()->count()
            ],
            [
                'title' => 'Administrateur & utilisateurs',
                'count' => null //User::query()->count()
            ],
            [
                'title' => 'Produits',
                'count' => null //Product::query()->count()
            ]
        ];
        $max_sale_prod_by_sales_count = Product::maxSale() ;
        $min_sale_prod_by_sales_count = Product::minSale() ;
        $max_sale_prod_by_total_price = Product::maxSaleByTotalPrce() ;
        $min_sale_prod_by_total_price = Product::minSaleByTotalPrce() ;
        $max_sale_cashiers = User::maxSeller() ;
        $min_sale_cashiers = User::minSeller() ;

        $products_panels_data = [
            [
                'title' => " Produits avec le plus grand nombre de ventes",
                'product' =>  $max_sale_prod_by_sales_count  ,
                'count' =>  !empty($max_sale_prod_by_sales_count) ?
                    $max_sale_prod_by_sales_count[0]->sales->count() : '--',
                'small_text' => "Le plus grand nombre de ventes :"
            ],
            [
                'title' => " Produits avec le plus petit nombre de ventes",
                'product' => $min_sale_prod_by_sales_count,
                 'count' =>  !empty($min_sale_prod_by_sales_count) ?
                     $min_sale_prod_by_sales_count[0]->sales->count() : '--',
                'small_text' => "Le plus petit nombre de ventes :"
            ],
            [
                'title' => " Produits avec le plus grand prix total de ventes",
                'product' =>  $max_sale_prod_by_total_price  ,
                'count' =>  !empty($max_sale_prod_by_total_price) ?
                    $max_sale_prod_by_total_price[0]->total_sales_price : '--',
                'small_text' => "le plus grand prix total de ventes :"
            ],
            [
                'title' => " Produits avec le plus petit prix total de ventes",
                'product' => $min_sale_prod_by_total_price,
                'count' =>  !empty($min_sale_prod_by_total_price) ?
                    $min_sale_prod_by_total_price[0]->total_sales_price : '--',
                'small_text' => "le plus petit prix total de ventes :"
            ],
        ];
        $cashiers_panels_data = [
            [
                "title" => " Caissiers avec le plus grand nombre de vente",
                "cashier" => $max_sale_cashiers,
                'count' =>  !empty($max_sale_cashiers) ? $max_sale_cashiers[0]->sales->count() : '--'
            ],
            [
                "title" => " Caissiers avec le plus petit nombre vente",
                "cashier" => $min_sale_cashiers,
                'count' =>  !empty($min_sale_cashiers) ? $min_sale_cashiers[0]->sales->count() : '--'
            ],
        ];
        return view('homepages.admin',
        compact("cashiers_panels_data","products_panels_data","counts_data"));
    }

}
