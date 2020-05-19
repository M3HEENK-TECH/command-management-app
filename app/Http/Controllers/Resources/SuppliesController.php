<?php

namespace App\Http\Controllers\Resources;


use App\Http\Requests\StoreSuppliesRequest;
use App\Http\Requests\UpdateSuppliesRequest;
use App\Models\Product;
use App\Models\provider;
use App\Models\Supply;
use Exception as ExceptionAlias;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Repository\Supply\SuppliesRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;


class SuppliesController extends Controller
{
    /**
     * @var SuppliesRepository
     */
    protected $suppliesRepository;

    /**
     * @var integer
     */
    protected $nbreParPage = 5;

    public function __construct(SuppliesRepository $suppliesRepository)
    {
        $this->suppliesRepository = $suppliesRepository;
    }

    /**
     * @return \Illuminate\Http\Response
     * @throws ExceptionAlias
     */
    public function index()
    {
        $supplies = $this->suppliesRepository->paginate($this->nbreParPage);
        if (Input::get("filter") == "deleted") {
            $supplies = $this->suppliesRepository->makeModel()->onlyTrashed()->paginate($this->nbreParPage);
        }
        $links = $supplies->links();
        $data = [
            'links' => $links,
            'supplies' => $supplies,
            'providers'=> Provider::all(),
            'products' => Product::all(),
        ];

        return Response::view('resources.supplies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            "providers" => provider::all(),
            "products" => Product::all()
        ];
        return Response::view('resources.supplies.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSuppliesRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSuppliesRequest $request)
    {
        $supply = $this->suppliesRepository->create($request->all());

        if($supply){

            $product = product::find($request->product_id);

            $product->quantity += $request->quantity; // mise à jour de la nouvelle quantite
            $product->price = ($product->quantity * $product->price_unity);// nouveau prix total du produit ajouté

            $product->save();
        }
        return Response::redirectToRoute('supplies.index')
            ->with("success", "L'Approvisionnement à bien été enregistrer");
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        return Response::view('show', compact('supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Supply $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        $data = [
            "providers" => provider::all(),
            "products" => Product::all(),
            "supply" => $supply
        ];
        return Response::view('resources.supplies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSuppliesRequest $request
     * @param Supply $supply
     * @return RedirectResponse
     */

    public function update(UpdateSuppliesRequest $request, Supply $supply)
    {
        $supply->update($request->all());

        return Response()->redirectToRoute('supplies.index')
            ->with("success", "L'approvisionnement a été mis à jour ");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Supply $supply
     * @return RedirectResponse
     * @throws ExceptionAlias
     */
    public function destroy(Supply $supply)
    {
        $supply->delete();

        return Response()->redirectToRoute("supplies.index")->with("success", "Element supprimer avec succes");
    }


    /**
     * Confirmer un Approvisonement
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function confirm(int $id)
    {
        $supply = $this->suppliesRepository->find($id);
        $supply->update([
            "confirmed_at" => now()
        ]);
        return Response::redirectToRoute("supplies.index")
            ->with("success", "Approvisionement marquer comme supprimer avec succes");
    }


}
