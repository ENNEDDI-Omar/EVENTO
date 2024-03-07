<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstablishmentStoreRequest;
use App\Http\Requests\EstablishmentUpdateRequest;
use App\Models\Establishment;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index()
    {
        $establishments=Establishment::all();
      return view('admin.dashboard', compact('establishments'));
    }

    public function show(Establishment $establishment)
    {
        return view('admin.establishment.show');
    }

    public function create()
    {
      return view('admin.establishment.create');
    }

    public function store(EstablishmentStoreRequest $request)
    {
        Establishment::create($request->validated());
        return redirect()->route('administrator.dashboard.index')->with('success', 'Establishment created successfully');
    }

    public function edit(Establishment $establishment)
    {
      return view('admin.establishment.edit', compact('establishment'));
    }

    public function update(EstablishmentUpdateRequest $request, Establishment $establishment)
    {
       $establishment->update($request->validated());
       return redirect()->route('administrator.dashboard.index')->with('success', 'Establishment updated successffuly');
    }

    public function destroy(Establishment $establishment)
    {
       $establishment->delete();
       return redirect()->route('administrator.dashboard.index')->with('success', 'Establishment deleted successffuly');
    }
}
