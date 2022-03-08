<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
         $posts=Post::where('title','Article 2')->select(['title','slug'])->get()->toArray();
         $title = "A propos";
         return  view('pages/about',
           [
               'title' => $title,
               'numbers' => $posts[0]
           ]
        );
    }
}
