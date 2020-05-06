<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\product;
use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $data = [
            "sales" => session("card_sales") ?? []
        ];
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
        foreach (session()->get("card_sales") as $sale) {
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
        session()->push("card_sales", $data);

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
     * @param Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
