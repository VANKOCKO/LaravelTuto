<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Categories  <b></b>
            <b style="float: right">
                <span class="badge badge-danger"></span>
            </b>
        </h2>
    </x-slot>
<div class="py-12">
            <div class="container">
                   <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                         Edit Category
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ url('category/update/'.$categories->id)}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="categoryName">Update Category Name</label>
                                            <input type="text" class="form-control" name="category_name" value="{{ $categories->category_name }}" aria-describedby="emailHelp">
                                            @error('category_name')
                                                 <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Category</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                   </div>
            </div>
</div>

</x-app-layout>
