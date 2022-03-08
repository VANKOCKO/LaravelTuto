<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinksController extends Controller
{
     public function index(){
         echo "Top";
     }
     public function create(){
           return View('links/create');
     }
     public function store(Request $request){
        $link = Link::create(
                 [
                   'url' => $request->url
                 ]);

        return view('links/success',
          [
              'link' => $link
          ]);
    }
    public function show($id){
        $link = Link::findOrFail($id);
        return new RedirectResponse($link->url,301);
    }
}
