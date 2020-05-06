<?php


namespace App\Http\Controllers\Resources;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class AppSalesController
{


    /**
     * Display list of sales in database
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Response::view("resources.app_sales.index");
    }

    /**
     * Confirm sales , saving card sales in database
     * @param Request $request
     */
    public function store(Request $request){

    }

}
