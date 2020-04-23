<?php

namespace App\Http\Controllers\Resources;


use App\Http\Requests\StoreSuppliesRequest;
use App\Http\Requests\UpdateSuppliesRequest;
use App\Models\product;
use App\Models\Provider;
use Exception as ExceptionAlias;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Repository\Supply\SuppliesRepository;
use Illuminate\Http\Response;
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

    public function index()
    {
        $supplies = $this->suppliesRepository->paginate($this->nbreParPage);
        if ( Input::get("filter") == "deleted" ){
            $supplies = $this->suppliesRepository->makeModel()->onlyTrashed()->paginate($this->nbreParPage);
        }
        return Response()->view('resources.supplies.index',compact('supplies','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Response()->view('resources.supplies.create');
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

        return Response()->redirectToRoute('supply')->with("success","L'Approvisionnement à bien été enregistrer");
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $supply = $this->suppliesRepository->find($id);
        return Response()->view('show',compact('supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $supply = $this->suppliesRepository->find($id);
        $providers  = Provider::all();
        $products  = product::all();

        return Response()->view('resources.supplies.edit',
            compact('supply',"providers","products"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSuppliesRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(UpdateSuppliesRequest $request, int $id)
    {
        $this->suppliesRepository
            ->find($id)
            ->update($request->all());

        return Response()->redirectToRoute('supplies.index')->with("success","L'approvisionnement a été mis à jour ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws ExceptionAlias
     */
    public function destroy(int $id)
    {
        $this->suppliesRepository->delete($id);

        return Response()->redirectToRoute("supplies.index")->with("success","Element supprimer avec succes");
    }


    /**
     * Confirmer un Approvisonement
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function confirm(int $id)
    {
        $supply = $this->suppliesRepository->find($id);
        $supply->update([
            "confirmed_at" => now()
        ]);
        return Response()
            ->redirectToRoute("supplies.index")
            ->with("success","Approvisionement marquer comme supprimer avec succes");
    }


}
