<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Response;

class CashiersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cashier = User::where('role', 'cashier')->get();
        return view('resources.cashiers.index')
            ->with("cashiers", $cashier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("resources.cashiers.create");
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

            "role" => "cashier",
            'password' => bcrypt($request->password)
        ]);

        $user = User::create($request->all());

        $user->UploadImage($request->file("profile_image"));
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
     * @param \App\Models\User $cashier
     * @return Response
     */
    public function edit(User $cashier)
    {
        return view("resources.cashiers.edit")->with("cashier", $cashier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $cashier
     * @return Response
     */
    public function update(UpdateUserRequest $request, User $cashier)
    {

        $cashier->update([
            'name' => $request->name ?? $cashier->name,
            'email' => $request->email ?? $cashier->email,
            'password' => !empty($request->password) ? bcrypt($request->password) : $cashier->password,
        ]);
        if (is_object($request->file("profile_image"))) {
            $cashier->UploadImage($request->file("profile_image"));

        }
        return redirect()
            ->route('cashiers.index')
            ->withSuccess("Mise a jour realiser avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $cashier
     * @return Response
     */
    public function destroy(User $cashier)
    {
        $cashier->delete();

        return redirect()
            ->route('cashiers.index')
            ->withSuccess("Suppression realiser avec success");
    }

}
