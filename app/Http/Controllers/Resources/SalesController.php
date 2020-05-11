<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;

class SalesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_quantity = 0;
        $card_sales = session()->get(Sale::CARD_SESSION_KEY) ?? [];
        foreach ($card_sales as $sale) {
            $product_quantity += $sale['quantity'];
        }
        $data = [
            "sales_total" => $product_quantity,
            "sales" => $card_sales
        ];
        //session()->remove(Sale::CARD_SESSION_KEY);
        return Response::view("resources.sales.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "products" => Product::all()
        ];

        return Response::view("resources.sales.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreSalesRequest $request)
    {
        $product = Product::query()
            ->where("id", $request->get("product_id"))
            ->where("quantity", ">=", $request->get("quantity") )
            ->first();
        if (empty($product)) {
            return back()->withErrors(["quantity" => "Quantité du produit : La quantité est supérieur a celle en stock"]);
        }
        $product_quantity = 0;
        $card_sales = session()->get(Sale::CARD_SESSION_KEY) ?? [];
        foreach ($card_sales as $sale) {
            if ($sale['product']->id === $product->id) {
                $product_quantity += $sale['quantity'];
            }
        }
        if ($product_quantity > $product->quantity) {
            return back()->withErrors(["quantity" =>
                "Quantité du produit : La quantité du produit ajouter + plus la quantité des produits déja en session est supérieur a celle en stcok"]);
        }
        $request->merge(["product" => $product]);
        $data = $request->only(Sale::CARD_SESSION_FIELDS);
        session()->push(Sale::CARD_SESSION_KEY, $data);
        return Response::redirectToRoute("sales.index")
            ->with("success", "Vente enregistrer en session");
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param int $sale_key
     * @return RedirectResponse
     */
    public function destroy(int $sale_key)
    {
        $data = session()->get(Sale::CARD_SESSION_KEY);
        /**
         * News card sales array without card sales with $sale_key
         */
        $newData = Arr::except($data,$sale_key);
        session()->remove(Sale::CARD_SESSION_KEY);
        session()->put(Sale::CARD_SESSION_KEY,$newData);
        return back()->with("success","Produit supprimer du panier avec success");

    }

    /**
     * @return RedirectResponse
     */
    public function destroyAll()
    {
        session()->remove(Sale::CARD_SESSION_KEY);
        return back()->with("success","Produit supprimer du panier avec success");

    }



}
