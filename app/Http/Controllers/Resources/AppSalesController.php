<?php


namespace App\Http\Controllers\Resources;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Models\Sale;
use App\Models\Product;

class AppSalesController
{


    /**
     * Display list of sales in database
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $caissiers = User::where('role', 'cashier')->get();
        return view('resources.app_sales.index')->with("caisses", $caissiers);
    }

    /**
     * Confirm sales , saving card sales in database
     * @param Request $request
     */
    public function store(){

        $data = [
            'sales'=> sale::all(),
            'products'=> Product::all()
        ];

            return Response::view('ressources.app_sales.listeVente',$data);
    }

}
