<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('pages.admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:categories,name'],
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        $validatedData['description'] = $request->description;
        $validatedData['type'] = $request->type;

        Category::create($validatedData);
        
        Alert::success('Berhasil!', 'Data kategori berhasil ditambahkan!');

        return back();
    }
}
