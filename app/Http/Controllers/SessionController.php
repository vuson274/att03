<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function setSession(Request $request){
        session(['number'=>2]);
        $request->session()->put('name','HTT');
        // $request->session()->put('test',null);
        return redirect()->route('session')->with('status','Tao session thanh conng');
    }

    public function getSession(Request $request){
        // echo session('number').'<br>';
        // echo $request->session()->get('name');
        // $data = $request->session()->all();
        // dd($data);
        // if ($request->session()->has('test')){
        //     echo 'co';
        // }else{
        //     echo 'khong';
        // }
        echo $request->session()->get('status');
    }

    public function delSession(Request $request){
        // $request->session()->forget(['test','number']);
        $data = $request->session()->pull('name');
        echo $data;
    }

    public function viewSession(){
        return view('session');
    }
}
