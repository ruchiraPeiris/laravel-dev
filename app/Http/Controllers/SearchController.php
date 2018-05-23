<?php

namespace App\Http\Controllers;
use App\Post;  
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class SearchController extends Controller { 

    public function search(Request $req){

      	$error = ['error'=>'No results found, please try with different keywords.'];

      	if ($req->has('q')){
            $posts = Post::where('title','LIKE','%'.$req->get('q').'%')->orWhere('slug','LIKE','%'.$req->get('q').'%')->get();
            return view('search')->withPosts($posts);
      	} else {
        	$posts = Post::all();
        	return view('search')->withPosts($posts);
      	}
    }
}