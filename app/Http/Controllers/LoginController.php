<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{



    public function login(Request $request)
    {
        session()->flush();
       
       DB::beginTransaction();
       $result = DB::table('usuarios')->
       where('usuario','=',$request->input('user'))->
       where('password','=',$request->input('password'))->get();
    
       if(!empty($result)){
           //SET NEW SESSION WITH ID
           session()->regenerate();
           session(['idaccount' => $result[0]->id]);
           
        return redirect('/home/'.$result[0]->id)->with('id',$result[0]->id); 
       }else{
           session()->flash('error','Credenciales Invalidas');
        return redirect('/') ;
       }

       
    }
    public function logout(Request $request)
    {
        session()->flush();
        return back(); 
    }
    
}

?>

