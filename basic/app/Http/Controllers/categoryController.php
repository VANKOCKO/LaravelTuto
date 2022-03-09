<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
     /**
      * allCat
      *
      * @return void
      */
     public function allCat(){

           /**
            * Query Builder with relashionship Data : Categories Users
            */
            //  $categories =DB::table('categories')
            //                ->join('users','categories.user_id','users.id')
            //                ->select('categories.*','users.name')
            //                ->latest()->paginate(5);

            /**
             *  Get Data with Models ORM
             */
             $categories = Category::latest()->paginate(5);
             $trashCat = Category::onlyTrashed()->latest()->paginate(3);
            // foreach ($categories as $cat) {
            //     dd($cat->user->name);
            // }

            /**
             *  Get Data with Query Builder
             */
             //$categories = DB::table('categories')->latest()->paginate(5);
            return view('admin.category.index',
            [
                'categories' => $categories,
                'trashCat' => $trashCat
            ]);
     }
     /**
      * addCat
      *
      * @param  mixed $request
      * @return void
      */
     public function addCat(Request $request){

        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Less Then 255Chars',
        ]);

        /**
         *   Insert with Model function insert
         */
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        /**
         *  Insert with instance data
         */
        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();
        /**
         *  Insert with query Builder
         */
        //  $data = array();
        //  $data['category_name'] = $request->category_name;
        //  $data['user_id'] = Auth::user()->id;
        //  DB::table('categories')->insert($data);
        return Redirect()->back()->with('success','Category Inserted Successfull');
 }

    /**
     * editCat
     *
     * @param  mixed $id
     * @return void
     */
    public function editCat($id){
       /**
        *  Query Builder
        */
       $categories = DB::table('categories')->where('id',$id)->first();
       /**
        *  Eloquent
        */
       //$categories = Category::find($id);
       return view('admin.category.edit',[
              'categories' => $categories
       ]);
    }


    /**
     * updateCat
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateCat(Request $request, $id){
        /**
         *  Eloquent
         */
        // $update = Category::find($id)->update([
        //        'category_name' => $request->category_name,
        //        'user_id' => Auth::user()->id
        // ]);

        /**
         *  Query Builder
         */
        $data = Array();
        $data['category_name'] =  $request->category_name;
        $data['user_id'] =  Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);
        return Redirect()->route('all.category')->with('success','Category Update Successfull');

     }

     /**
      * softDeleteCat
      *
      * @param  mixed $id
      * @return void
      */
     public function softDeleteCat($id){
        /**
         *  Eloquent
         */
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Delete Successfull');
     }


     /**
      * restoreCat
      *
      * @param  mixed $id
      * @return void
      */
     public function restoreCat($id){
           $delete = Category::withTrashed()->find($id)->restore();
           return Redirect()->back()->with('success','Category Restore Successfull');
     }

     /**
      * pdeleteCat
      *
      * @param  mixed $id
      * @return void
      */
     public function pdeleteCat($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleted');
     }



}
