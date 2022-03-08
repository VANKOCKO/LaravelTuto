@extends('default')
@section('content')
<div class="container">
     <div class="row">
         <div class="col-">
            <h1>Raccourcir un nouveau lien</h1>
            <form action="{{ route('createLink') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="url">Lien a Raccourcir </label>
                        <input type="text" name="url" id="" class="form-control" placeholder="http://......" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Raccourcir</button>
                    </div>
            </form>
         </div>

     </div>
</div>

@stop
