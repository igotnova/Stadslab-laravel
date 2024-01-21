<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


class AdminPostController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $posts = DB::table('posts')->where('user_id', $user->id)->paginate(50);

        if ($user->is_admin) {
            return view('admin.posts.index', [

                'posts' =>  Post::paginate(50)

            ]);
        }else{
            return view('admin.posts.index', [
                'posts' =>   $posts

            ]);

        }


    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(){

        $attributes = request()->validate([
            'title' => ['required'],
            'thumbnail' =>['required','image'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $attributes ['user_id'] = auth()->id();
        $attributes['thumbnail'] = request('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', ['post'=> $post]);
    }


    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'thumbnail' =>['image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($attributes['thumbnail'])){
        $attributes['thumbnail'] = request('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('sucess', ' post updated!');
    }

    public function destroy(Post $post){
        $post->delete();

        return back()->with('sucess', ' post deleted!');
    }

    public function change(Post $post)
    {
        // ddd($post->active);

        $attributes = request()->validate([
            'active' => ['required']
        ]);


        $post->update($attributes);

        return back()->with('sucess', ' status changed');
    }

}
