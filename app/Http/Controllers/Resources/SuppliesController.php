<?php

namespace App\Http\Controllers\Resources;

<<<<<<< Updated upstream
use App\Http\Requests\SupliesRequest;
use App\Models\Supply;
=======
use App\Http\Requests\StoreSuppliesRequest;
use App\Http\Requests\UpdateSuppliesRequest;
//use App\Models\Supply;
>>>>>>> Stashed changes
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repository\Supply\SuppliesRepository;

class SuppliesController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $suppliesRepository;
    protected $nbreParPage = 5;

    public function _construct(SuppliesRepository $suppliesRepository)
    {

        $this->suppliesRepository = $suppliesRepository;
    }

    public function index()
    {
        $supply = $this->suppliesRepository->getPaginate($this->nbreParPage);
        $links = $supply->render();

        return view('index',compact('supply','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupliesRequest $request)
    {
        $supply = $this->suppliesRepository->store($request->all());

        return redirect('supply')->withOk("L'Approvisionnement à bien été enregistrer");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supply = $this->suppliesRepository->getById($id);

        return view('show',compact('supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supply = $this->suppliesRepository->getById($id);

        return view('edit',compact('supply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
<<<<<<< Updated upstream
    public function update(SupliesRequest $request, Supply $supply)
=======
    public function update(UpdateSuppliesRequest $request, $id)
>>>>>>> Stashed changes
    {
        $this->suppliesRepository->update($id,$request->all());

        return redirect('supply')->withOk("L'approvisionnement a été mis à jour ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->suppliesRepository->destroy($id);

        return redirect()->back();
    }

    /**
     * List avec les Approvisonement supprimer
     *
     * @return \Illuminate\Http\Response
     */
    public function listWithSoftDeleted()
    {
        //
    }

    /**
     * Confirmer un Approvisonement
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(int $id)
    {
        //
    }


}
