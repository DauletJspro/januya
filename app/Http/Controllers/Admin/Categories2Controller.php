<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Categories2Controller extends Controller
{
    public function index()
    {

        $categories = Category2::all();

        return view('categories2.index', compact('categories'));
    }

    public function create()
    {
        return view('categories2.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = new Category2([
            'name' => $request->input('name'),
        ]);

        $category->save();

        return redirect()
            ->back()
            ->with("status", "Category Created!");
    }
}
