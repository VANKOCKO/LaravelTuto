@extends('default')
<div class="container">
    <div class="row">
          <div class="col">
                  <h1> Bravo ! </h1>
                  <p>
                        <a class="btn btn-primary" href="{{  route('linkshow',['id' => $link->id]) }}">
                               {{ route('linkshow',['id' => $link->id]) }}
                        </a>
                  </p>
          </div>
    </div>
</div>
