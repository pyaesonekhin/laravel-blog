<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
      $categories = Category::when(request('search'), function($query) {
            $query->where('name', 'like', "%" . request('search') . "%");
        })
        ->latest('id')
        ->paginate(7)
        ->withQueryString();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
       return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name
        ]);

        return redirect('categories')->with('success', 'A category was created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);

        return redirect('categories')->with('success', 'A category was updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'A category was deleted successfully.');
    }
}