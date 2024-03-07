<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('organisator.dashboard', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('organisator.eventss.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
    try {
        Category::create($request->validated());
        Session::flash('success', 'Category created successfully');
        return redirect()->route('administrator.dashboard.index');
    } catch (\Exception $e) 
    {
        return view('admin.error')->with('error', 'Failed to create category.');
    }
    }



    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
    try 
    {
        $category->update($request->validated());
        Session::flash('success', 'Category updated successfully');
        return redirect()->route('administrator.dashboard.index');
    } 
    catch (\Throwable $th) 
    {
        return view('admin.error')->with('error', 'An error occurred during category update.');
    }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('success', 'Category deleted successfully');

        return redirect()->route('administrator.dashboard.index');
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        if ($category) 
        {

            $category->restore();
            Session::flash('success', 'Category restored successfully');
            return redirect()->route('administrator.dashboard.index');
            
        } else {
            Session::flash('error', 'Category not found');
            return redirect()->route('administrator.dashboard.index');
        }

    
    }

    
}

