<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\ProvidersRequest;
use App\Models\Provider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\ProviderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\StoreProvidersRequest;
use App\Http\Requests\UpdateProvidersRequest;

class ProvidersController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $providers = Provider::all();

        return view('resources.providers.index',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('resources.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @para m ProvidersRequest $request
     * @return void
     */
    public function store(StoreProvidersRequest $request)
    {
       Provider::create($request->all());

       return redirect()->route('resources.providers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return Application|Factory|View
     */
    public function show(Provider $provider)
    {
        //return view('resources.providers.index', ['provider' => $provider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return Response
     */
    public function edit(Provider $provider)
    {
        return view('resources.providers.edit',compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Provider  $provider
     * @return Response
     */
    public function update(UpdateProvidersRequest $request, Provider $provider)
    {
        $provider->update($request->all());

        return  redirect()->route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return back();
    }
}
