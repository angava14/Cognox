<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    
    public function index($id){
        //Verificar con Session si es el mismo que viene en ID , sino logout y redirect
        if(session()->has('idaccount') ){
            if(session('idaccount') == $id){
                return view('home')->with('id',$id);
            }else{
                return back();
            }
            
        }else{
            return redirect('');
        }

    }


}
