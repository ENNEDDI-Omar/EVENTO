<?php

namespace App\Http\Controllers\Organisator;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganisatorStoreRequest;
use App\Models\Establishment;
use App\Models\Organisator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $establishments = Establishment::all();
        return view('organizer_form', compact('establishments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganisatorStoreRequest $request)
    {
        $data = $request->validated();
        
        $establishment = Establishment::findOrFail($data['establishment_id']);

        if ($establishment->confirmation_code !== $data['confirmation_code']) {
            return redirect()->back()->withErrors(['confirmation_code' => 'Invalid confirmation code for the selected establishment.'])->withInput();
        }
        $organisator = Organisator::create([
            'user_id' => Auth::id(),
            'establishment_id' => $data['establishment_id'],
        ]);

        $organisator->user->assignRole('organisator');

        return redirect()->route('home')->with('success', 'You became an organisator');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
