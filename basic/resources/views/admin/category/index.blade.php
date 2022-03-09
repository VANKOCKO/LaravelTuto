<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories  <b></b>
            <b style="float: right">
                <span class="badge badge-danger"></span>
            </b>
        </h2>
    </x-slot>
<div class="py-12">
            <div class="container">
                   <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="card-header">
                                            All Category
                                    </div>

                                    <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                  // $id = 0;
                                                @endphp
                                                @foreach($categories as $categorie)

                                                    <tr>
                                                        <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                                        <td>{{ $categorie->category_name }}</td>
                                                        <td>{{ $categorie->user->name }}</td>
                                                        <td>
                                                            @if($categorie->created_at == NULL)
                                                               <span class="text-danger">No Date Set</span>
                                                            @else
                                                              {{  Carbon\Carbon::parse($categorie->created_at)->diffForHumans() }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('category/edit/'.$categorie->id) }} " class="btn btn-info">Edit</a>
                                                            <a href="{{ url('softdelete/category/'.$categorie->id) }}" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                    {{ $categories->links() }}
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                         Add Category
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('store.category') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="categoryName">Category Name</label>
                                            <input type="text" class="form-control" name="category_name" aria-describedby="emailHelp">
                                            @error('category_name')
                                                 <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Category</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                   </div>
            </div>
            {{-- Trash  Part --}}
            <div class="container">
                <div class="row">
                         <div class="col-md-8">
                             <div class="card">
                                 @if(session('success'))
                                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <strong>{{ session('success') }}</strong>
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                         </button>
                                     </div>
                                 @endif
                                 <div class="card-header">
                                          Trash List
                                 </div>

                                 <table class="table">
                                         <thead>
                                             <tr>
                                             <th scope="col">SL No</th>
                                             <th scope="col">Category Name</th>
                                             <th scope="col">User</th>
                                             <th scope="col">Created At</th>
                                             <th scope="col">Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @php
                                               // $id = 0;
                                             @endphp
                                             @foreach($trashCat as $categorie)

                                                 <tr>
                                                     <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                                     <td>{{ $categorie->category_name }}</td>
                                                     <td>{{ $categorie->user->name }}</td>
                                                     <td>
                                                         @if($categorie->created_at == NULL)
                                                            <span class="text-danger">No Date Set</span>
                                                         @else
                                                           {{  Carbon\Carbon::parse($categorie->created_at)->diffForHumans() }}
                                                         @endif
                                                     </td>
                                                     <td>
                                                         <a href="{{ url('category/restore/'.$categorie->id) }} " class="btn btn-info">Restore</a>
                                                         <a href="{{ url('pdelete/category/'.$categorie->id) }}" class="btn btn-danger">P Delete</a>
                                                     </td>
                                                 </tr>
                                             @endforeach
                                         </tbody>
                                 </table>
                                 {{ $trashCat->links() }}
                             </div>
                     </div>
                     <div class="col-md-4">
                         <div class="card">
                         </div>
                     </div>
                </div>
         </div>
</div>

</x-app-layout>
