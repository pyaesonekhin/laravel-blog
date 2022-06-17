<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/categories/create')
            ->withErrors('$validator')->withInput();
        }

        // $request->validate([
        //     'title' => 'required'
        // ],[
        //     'title.required' => 'Please fill the title'
        // ]);


        $category = new Category;
        $category->name = request('name');
        $category->created_at = now();
        $category->updated_at = now();
        $category->save();

        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/categories/edit')
            ->withErrors('$validator')->withInput();
        }

        // $request->validate([
        //     'title' => 'required'
        // ],[
        //     'title.required' => 'Please fill the title'
        // ]);


        $category = Category::find($id);
        $category->name = request('name');
        $category->updated_at = now();
        $category->save();
        return redirect('/categories');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('/categories.show', compact('category'));
    }


    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/categories');
    }
}
