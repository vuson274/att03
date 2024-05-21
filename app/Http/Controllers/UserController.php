<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Fruit;
use App\Models\Image;
use App\Models\Order;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;

class UserController extends Controller
{
    public function list(){
        // $data = collect([1,2,3]);
        // $data1 = new Collection([1,2,3]);
        // $data = \Illuminate\Support\Collection::make([1,2,3]);
        // $data = Product::all();
        // $data->each(function ($item,$key){
        //     echo $item->name."</br>";
        // });
        // $newData = $data->map(function ($item,$key){
        //     $item = $item->name.' test';
        //     return $item;
        // });
        // $newData = $data->pluck('name');
        // $newData = $data->filter(function ($item){
        //     return $item->id >2;
        // });
        // $collection = collect([
        //                           'usd' => 1400,
        //                           'gbp' => 1200,
        //                           'eur' => 1000,
        //                       ]);
        //
        // $ratio = [
        //     'usd' => 1,
        //     'gbp' => 1.37,
        //     'eur' => 1.22,
        // ];
        //
        // $newData=$collection->reduce(function ($carry, $value, $key) use ($ratio) {
        //     return $carry + ($value * $ratio[$key]);
        // });
        // dd($newData);

        $data = User::find(3);
       dd($data);
    }

    public function formUpload(){
        return view('upload');
    }

    public function upload(Request $request){
        $data = $request->all();
        $file = $data['img'];
        $fileName = time().$file->getClientoriginalName();
        $file->storeAs('/user',$fileName,'public');
        $image = new Image();
        $image['path'] = 'storage/user/'.$fileName;
        $image['imageable_id']= 3;
        $image['imageable_type'] = User::class;
        $image->save();
    }

    public function login(){
        return view('login');
    }

    public function singin(Request $request){
        $data = $request->all();
        if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return redirect()->route('user');
        }
        return back();
    }


    public function logout(){
        Auth::logout();
    }
}
