<?php


namespace App\Http\Controllers\Resources;


use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Response;
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
        $url_params = Input::only(["user_id"]);
        $clauses = $url_params;
        $data = [];
        if (auth()->user()->isCashier()) {
            $clauses = ["user_id" => auth()->id()];
        }
        if (auth()->user()->isAdmin()) {
            $data['cashiers'] = User::query()->cashier()->get();
        }
        $data['sales'] = Sale::query()
            ->with([
                "product",
                "cashier" => static function ($query) {
                    $query->select(["name", "id"]);
                },
            ])
            ->where($clauses)
            ->where($url_params)
            ->latest()
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

        $product = new Product;
            $product->price = $product->quantity * $product->unity_price;
            $product->update();
    
        return redirect()->route("app_sales.index")->withSuccess("Vente effectuer");
    }


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

    //Permet d'envoyer un message d'erreur a l'admin concernant le stock

    public function sendErrorMessage(Request $request)
    {
        $message = $request->message;
        $id = $request->user_id;

        $errmessage = new errorMessage(
            [
                "message" => $message,
                "user_id" => $id
            ]
        );

        dd($errmessage);

            if($errmessage->save())
            {
                return redirect()->route('app_sales.index');
            }

        
    }


}
