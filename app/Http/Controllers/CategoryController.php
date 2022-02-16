<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function allCat(){
        $category = Category::latest()->paginate(4);
        $trash = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index', compact('category', 'trash'));
    }

    public function addCat(Request $request){

        $validated = $request->validate([
            'category_name'=> 'required|string|max:15',
        ],
        [
            'category_name.required'=> "Name is required",
            'category_name.max'=> 'max 5 caharcter',
        ]);

        // Eloquent ORM

/*         Category::insert([
            'user_id'=>Auth::user()->id,
            'category_name'=> $request->category_name,
            'crebated_at'=> Carbon::now(),
        ]); */

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        // Query Builder

/* $data = array();
$data['user_id'] = Auth::user()->id;
$data['category_name'] = $request->category_name;
DB::table('categories')->insert($data); */


        return redirect()->back()->with('success','Category Added Successfull');
    }


    public function editCat($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function updateCat (Request $request, $id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('all.category')->with('success','Category Update Successfull');
    }

    public function softDeleteCat ($id){
        $sdelete = Category::find($id)->delete();
        return redirect()->back()->with('success','Category Move Recycle bin Successfully');
    }

    public function restoreCat($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success','Category Restore Successfully');

    }

    public function permantDeleteCat($id){
        $delete= Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success','Category Delete Successfully');
    }
}
