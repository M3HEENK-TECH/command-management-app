<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class CashiersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashier = User::where('role', 'cashier')->get();
        return view('resources.cashiers.index')
            ->with("cashiers",$cashier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view("resources.cashiers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreUserRequest $request)
    {
        $request->merge([
            "role" => "cashier"
        ]);
        $user =  User::create($request->all());
        $user->UpdatedImage($request->file("profile_image"));
        return back()->withSuccess("Creation reussie");
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('resources.cashiers.index',
            [
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->updated($request);
        $this->storeimage($user);
        return redirect()->route('cashiers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $userId
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $userId)
    {
        User::findOrFail($userId)->delete();

        return redirect()
        ->route('cashiers.index')
        ->withSuccess("Suppression realiser avec success");
    }
}
