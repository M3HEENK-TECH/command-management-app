<?php


namespace App\Http\Controllers\Resources;


use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request as Requestdate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class AppSalesController
{


    /**
     * Display list of sales in database
     * @return Response
     */
    public function index()
    {
        $url_params = Input::only(["cashier_id", "action"]);
        $sales_clause = !empty($url_params['cashier_id']) ? $url_params['cashier_id'] : [];
        $data = [];
        $data['sales'] = Sale::query()
            ->with([
                "product" ,
                "cashier" => static function ($query) {
                    $query->select(["name", "id"]);
                },
            ])
            ->where($sales_clause)
            ->paginate("30");
        //dd($data['sales'][0]->product->unity);
        $data['cashiers'] = User::query()->cashier()->get();
        return view('resources.app_sales.index', $data);
    }

    /**
     * Confirm sales , saving card sales in database
     * @param Request $request
     */
    public function store()
    {
        $data = [
            'sales' => sale::all(),
            'products' => Product::all()
        ];
        $insertion = Sale::insertSaleFromSession();
        if (!$insertion) {
            return back()->withErrors([
                "unknown" => "Erreur renconter lors de la vente, Pour etre sur de resoudre
                le probleme vous devez effacer tout les produits et recommencer"
            ]);
        }
        return back()->withSuccess("Vente effectuer");
    }

<<<<<<< Updated upstream
=======

    public function print(User $cashier)
    {
        $url_params = Input::only(["user_id"]);
        $data = [];
        $data['sales'] = Sale::query()
            ->with([
                "product",
                "cashier" => static function ($query) {
                    $query->select(["name", "id"]);
                },
            ])
            ->where(["user_id" => $cashier->id])
            ->paginate("30");
        //dd($data['sales'][0]->product->unity);
        $data['cashiers'] = User::query()->cashier()->get();
        $data['cashier'] = $cashier;
        return view('resources.app_sales.print', $data);
    }

    public function printbydate(Requestdate $request) {

     $id = $request->get('cashier_id');
     $user = User::all()->where('id', '=', $id);
     $date = $request->get('date');
     $print = DB::table('sales')
         ->join('users', 'users.id', '=', 'sales.user_id')
         ->join('products', 'products.id', '=', 'sales.product_id')
         ->where('sales.created_at' , '=' , $date)
         ->where('sales.user_id', '=', $id)
         ->orderBy('sales.id', 'desc')
         ->select( 'sales.id','products.name', 'products.quantity', 'products.unity', 'sales.created_at')
         ->get();
  
     return view('resources.app_sales.print_date', compact('user', 'print'));
    }


>>>>>>> Stashed changes
}
