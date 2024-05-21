<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const CART_KEY = 'CART';
    public function list(){
        $data = Product::all();
        return view('session', compact('data'));
    }

    public function card(Request $request){
        $id = $request->id;
        if ($request->session()->exists(self::CART_KEY)){
            $cart = $request->session()->get(self::CART_KEY);
            $found = false;
            for ($i=0 ; $i<count($cart); $i++){
                if ($cart[$i]['product']->id == $id){
                    $cart[$i]['quantity'] = $cart[$i]['quantity']+1;
                    $found = true;
                    break;
                }
            }
            if (!$found){
                $product = Product::find($id);
               array_push($cart,[
                   'product'=>$product,
                    'quantity'=>1,
               ]);
            }
            $request->session()->put(self::CART_KEY,$cart);
        }else{
            $product = Product::find($id);
            $cart = [];
            array_push($cart,[
                'product'=>$product,
                'quantity'=>1
            ]);
            $request->session()->put(self::CART_KEY,$cart);
        }
        return back()->with('status','Dat hang thanh cong');
    }


    public function listCart(Request $request){
        $data = $request->session()->get(self::CART_KEY);
        return view('list', compact('data'));
    }
}
