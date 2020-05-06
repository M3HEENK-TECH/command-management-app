<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\product;
use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;

class SalesController extends Controller
{
    /**
     * @var string CARD_SESSION_KEY
     */
    private const CARD_SESSION_KEY =  "card_sales";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "sales" => session(self::CARD_SESSION_KEY) ?? []
        ];
        //session()->remove(self::CARD_SESSION_KEY);
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
            "products" => product::all(["name", "id"])
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
        $product = product::query()
            ->where("id", $request->get("product_id"))
            ->where("quantity", ">", $request->get("quantity"))
            ->first();
        if (empty($product)) {
            return back()->withErrors(["quantity" => "Quantité du produit : La quantité est supérieur a celle en stcok"]);
        }
        $product_quantity = $product->quantity;
        $card_sales = session()->get(self::CARD_SESSION_KEY) ?? [];
        foreach ($card_sales as $sale) {
            if ($sale['product']->id === $product->id) {
                $product_quantity += $sale['product']->quantity;
            }
        }
        if ($product_quantity > $product->quantity) {
            return back()->withErrors(["quantity" =>
                "Quantité du produit : La quantité du produit ajouter + plus la quantité des produits déja en session est supérieur a celle en stcok"]);
        }
        $request->merge(["product" => $product]);
        $data = $request->only(["product", "product_id", "quantity"]);
        session()->push(self::CARD_SESSION_KEY, $data);

        return Response::redirectToRoute("sales.index")
            ->with("success", "Vente enregistrer en session");
    }

    /**
     * Display the specified resource.
     *
     * @param Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $sale_key
     * @return RedirectResponse
     */
    public function destroy(int $sale_key)
    {
        $data = session()->get(self::CARD_SESSION_KEY);
        /**
         * News card sales array without card sales with $sale_key
         */
        $newData = Arr::except($data,$sale_key);
        session()->remove(self::CARD_SESSION_KEY);
        session()->put(self::CARD_SESSION_KEY,$newData);
        return back()->with("success","Produit supprimer du panier avec success");

    }

    /**
     * @return RedirectResponse
     */
    public function destroyAll()
    {
        session()->remove(self::CARD_SESSION_KEY);
        return back()->with("success","Produit supprimer du panier avec success");

    }



}
