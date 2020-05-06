<?php

namespace App\Http\Controllers\Resources;


use App\Http\Requests\StoreSuppliesRequest;
use App\Http\Requests\UpdateSuppliesRequest;
use App\Models\product;
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
        $providers = provider::all();
        $products = product::all();
        $data = [
            "providers" => $providers,
            "products" => $products
        ];
        return Response::view('resources.supplies.create', $data);
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
        $providers = provider::all();
        $products = product::all();
        $data = [
            "providers" => $providers,
            "products" => $products,
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
