<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // $request->search;
        // $request->input('search');
        // $request->get('search');
        // $request->query('search'); // Get method only
        // request('search');

        // $posts = Post::all();
        $posts = Post::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(3);

        // $posts = Post::select('category_post.*')
        // ->join('category_post', 'posts.id', 'category_post.post_id')
        // ->where('title', 'like', '%' . $request->search . '%')
        // ->orderBy('id', 'desc')
        // ->paginate(3);

        // $posts = Post::select(['posts.*', 'users.name'])
        // ->join('users', 'users.id', '=', 'posts.user_id')
        // ->get()
        // ->toArray();
        // $posts = Post::select('posts.*', 'users.name as author')
        // ->join('users', 'users.id', '=', 'posts.user_id')
        // // ->simplePaginate(3);
        // ->orderBy('id', 'desc')
        // ->paginate(3);

        // $posts = DB::table('posts')->join('users', 'users.id', '=', 'posts.user_id')->first();

        // $categories = Category::select('categories.name as name')
        //     ->join('category_post', 'categories.id', '=', 'category_post.category_id')
        //     // ->join('posts', 'category_post.post_id', '=', 'posts.id')
        //     // ->where('category_post.post_id', '=', 'posts.id')
        //     // ->where('category_post.category_id', '=', 'categories.id')
        //     ->get();

        $cateposts = CategoryPost::select('category_post.*', 'categories.name as name', 'posts.*')
        ->join('posts', 'category_post.post_id', 'posts.id')
        ->join('categories', 'category_post.category_id', 'categories.id')
        ->where('posts.id', 'category_post.post_id')
        ->where('categories.id', 'category_post.category_id')
      
        ->get();


        return view('posts.index', compact('posts', 'cateposts'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    // use  App\Http\Requests\PostRequest;
    // use Illuminate\Support\Facades\Validator;
    public function store(PostRequest $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        // if($validator->fails()) {
        //     return redirect('/posts/create')
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        // $this->myValidate($request);
        // Validate
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5'
        // ],[
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
        //     'body.required' => 'အကြောင်းအရာထည့်ပါ။',
        //     'body.min' => 'အနည်းဆုံး ၅လုံးထည့်ပါ။'
        // ]);

        // request()->all();
        // $request->all();
        // request('title')

        // $post = new Post();
        // // $post->title = request('title');
        // // $post->body = request('body');
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->created_at = now();
        // $post->updated_at = now();
        // $post->save();

       

         $post = Post::create([
            'title' =>  $request->title,
            'body' =>  $request->body,
            'user_id' => auth()->id(),
        ]);

       foreach($request->categories as $category)
       {
            CategoryPost::create([
                'post_id' => $post->id,
                'category_id' => $category
            ]);
        }



        
        // Post::create($request->only(['title', 'body']));

        // $request->session()->flash('success', 'A post was created successfully.');
        // session()->flash('success', 'A post was created successfully.');

        return redirect('/posts')->with('success', 'A post was created successfully.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, $id)
    {
        // $this->myValidate($request);
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5'
        // ],[
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
        //     'body.required' => 'အကြောင်းအရာထည့်ပါ။',
        //     'body.min' => 'အနည်းဆုံး ၅လုံးထည့်ပါ။'
        // ]);

        $post = Post::find($id);
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->updated_at = now();
        // $post->save();

        // $post->update([
        //     'title' => $request->title,
        //     'body' => $request->body,
        // ]);
        $post->update($request->only(['title', 'body']));

        // session()->flash('success', 'A post was updated successfully.');

        return redirect('/posts')->with('success', 'A post was updated successfully.');
    }

    public function show($id)
    {
        // $post = Post::find($id);
        $post = Post::select(['posts.*', 'users.name as author'])
        ->join('users', 'users.id', 'posts.user_id')
        ->where('posts.id', $id)
        ->first();
        // ->find($id);


        // ->where('posts.id', $id)
        // ->first();


        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        Post::destroy($id);

        // $post = Post::find($id);
        // $post->delete();

        return redirect('/posts')->with('success', 'A post was deleted successfully.');
    }

    // public function myValidate($request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'body' => 'required|min:5'
    //     ],[
    //         'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
    //         'body.required' => 'အကြောင်းအရာထည့်ပါ။',
    //         'body.min' => 'အနည်းဆုံး ၅လုံးထည့်ပါ။'
    //     ]);
    // }
}