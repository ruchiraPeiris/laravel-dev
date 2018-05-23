<?php

namespace App\Http\Controllers\Api;
use App\Post;  
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class SearchController extends Controller { 
    // we will Installing and configuring Laravel Scout
    public function search(Request $req){
      	// First we define the error message we are going to show if no keywords
      	$error = ['error'=>'No results found, please try with different keywords.'];
      	// if the user entered the keyword
        //var_dump($req->get('q'));
      	if ($req->has('q') && $req->get('q') != ''){
        	// Using the Laravel Scout syntax to search the products table.
        	//$posts = Post::search($req->get('q'))->get();
          $posts = Post::where('title','LIKE','%'.$req->get('q').'%')->orWhere('slug','LIKE','%'.$req->get('q').'%')->get();
        	// If there are results return them, if none, return the error message.
        	return $posts->count() ? $posts : $error;
      	} else {
        	return $error;
      	}
    }
}