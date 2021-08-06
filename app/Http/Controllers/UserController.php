<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{
    public function search()
    {
        $search_text = $_GET['query'];

        $user = User::where('username','LIKE', '%'.$search_text.'%')->get();
        //dd($user);

        //  dd($user);


        if(count($user) > 0)
            return view ('profiles.search', compact('user'));
        else return  view('errors.show'); 
           
    }
}
