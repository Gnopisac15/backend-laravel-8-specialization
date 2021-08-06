<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');  

    }


    public function index(){

        $users = auth()->user()->following()->pluck('profiles.user_id');

        // $posts = Post::whereIn('user_id', $users)->latest()->get();

        $posts = Post::whereIn('user_id', $users)->latest()->paginate(3);
        
        return view('posts.index', compact('posts'));
    }



    public function create(){

        return view('posts.create');

    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'details' => 'required',
            'price' => 'required',
            'image' => ['required','image']

        ]);

        $imagePath = request('image')->store('uploads', 'public'); 

        $image = Image::make(public_path("storage/{$imagePath}"))->resize(200,200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'details' => $data['details'],
            'price' => $data['price'],
            'image' => $imagePath
        ]);

        // dd(request()->all()); 

        return redirect('/profile/'. auth()->user()->id);

    }

    public function show(\App\Models\Post $post)
    {
       return view('posts.show', compact('post'));

    }

    // public function search()
    // {
    //     $search_text = $_GET['query'];
    //     $posts = Post::where('caption','LIKE', '%'.$search_text.'%')->get();
    //     return view('posts.search', compact('posts'));
    // }
    
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        

        return redirect('/profile/'. auth()->user()->id);
    }


    
}
