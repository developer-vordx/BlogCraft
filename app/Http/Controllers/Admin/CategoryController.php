<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::where('tenant_id', tenant()->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'tenant_id' => tenant()->id,
        ]);
        return back();
    }

    // Add update, delete methods
}
