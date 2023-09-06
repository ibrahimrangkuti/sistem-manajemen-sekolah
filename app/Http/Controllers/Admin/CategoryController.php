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

        $category = [];
        if (request('id')) {
            $category = Category::find(request('id'));
        }


        return view('pages.admin.category.index', compact('categories', 'category'));
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

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:categories,name,' . $id],
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        $validatedData['description'] = $request->description;
        $validatedData['type'] = $request->type;

        $category->update($validatedData);
        
        Alert::success('Berhasil!', 'Data kategori berhasil diubah!');

        return redirect()->route('admin.category.index');
    }

    public function delete($id)
    {
        Category::find($id)->delete();

        Alert::success('Berhasil!', 'Data kategori berhasil dihapus!');

        return back();
    }
}
