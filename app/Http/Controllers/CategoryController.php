<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // public function list(Request $request){
    //    // $data = $request->all();
    //    // dd($data);
    //    //  $request->validate([
    //    //      'email'=>'required|email',
    //    //      'password'=>'required|min:6'
    //    // ]);
    //    //  $data = DB::table('products')->where('id','>','1')
    //    //  ->orwhere('price','>','50000')->get();
    //    //  $data = DB::table('products')->where(['id'=>2, 'price'=>100000])->get();
    //     $data = DB::table('products')->join('categories','products.category_id','=','categories.id')
    //                                  ->select('products.*','categories.name AS category_name ')->get();
    //    //  $data = DB::table('products')->leftJoin('categories','products.category_id','=','categories.id')
    //    //                               ->select('products.*','categories.id')->get();
    //    //  $data = DB::table('products')->rightJoin('categories','products.category_id','=','categories.id')
    //    //            ->select('products.id','categories.*')->get();
    //     dd($data);
    // }

    public function add(){
        // DB::table('categories')->where('id','=','4')->update(['name'=>'demo1']);
        // DB::table('categories')->where('id','=','4')->delete();
        // $category = new Category();
        // $category->name = 'category6';
        // $category->save();
        Category::create([
            'name'=>'category7'
                         ]);
    }


    public function list(){
       // $data = DB::table('categories')->get();
       //  $data = Category::where('id','>','2')->orderBy('id','DESC')->get();
       //  $data = DB::table('categories')->where('id','=','1')->get();
       //  $data = Category::find(1);
       //  $data = Category::where('id',2)->get();
       //  $data= Category::onlyTrashed()->get();
        $data = Category::paginate(10);
        $data->appends(['query'=>'category']);
        return view('category', compact('data'));
    }

    public function update($id)
    {
        // $category = Category::find($id);
        // $category->name = 'category10';
        // $category->save();
        Category::where('id',$id)->update([
            'name'=>'category12'
                                          ]);
    }

    public function delete($id){
        //c1
        // $category = Category::find($id);
        //         // $category->delete();
        //c2
        // Category::where('id',$id)->delete();
        Category::onlyTrashed()->where('id',$id)->forceDelete();
    }

    public function restore(){
        Category::onlyTrashed()->where('id',2)->restore();
    }
}
