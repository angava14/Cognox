<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Transaccion;

class TransaccionesController extends Controller
{

    public function index($id){
        //Verificar con Session si es el mismo que viene en ID , sino logout y redirect
        if(session()->has('idaccount') ){
            if(session('idaccount') == $id){
                return view('transacciones')->with('id',$id);
            }else{
                return back();
            }
            
        }else{
            return redirect('');
        }
        
    }

    public function listatransferencias($id){
        DB::beginTransaction();

        $cuentas = DB::table('usuario_cuenta')->
        where('usuario_id','=',$id)->get();
        $resultado = array();
        
        foreach($cuentas as $cuenta){

            $resultorigen = DB::table('transacciones')->
            where('cuenta_origen','=',$cuenta->cuenta)->get();
            $resultdestino = DB::table('transacciones')->
            where('cuenta_destino','=',$cuenta->cuenta)->get();

            $resultado = array_merge($resultado,$resultorigen, $resultdestino);
        }
        return $resultado;
    }

    public function cuentas($id){

        DB::beginTransaction();
        $cuentas = DB::table('usuario_cuenta')->
        where('usuario_id','=',$id)->get();
        
        return $cuentas;
    }

    public function transferir(Request $request){
        

        DB::beginTransaction();

        $cuenta_origen = $request->input('cuenta_origen');
        $cuenta_destino = $request->input('cuenta_destino');
        $monto = $request->input('monto');
        $tipotransaccion = $request->input('tipo_transaccion');
        $id = session('idaccount');


        if($tipotransaccion == 'propias'){
            // verificar que ambas cuentas sean del usuario y esten activas y esten marcadas para transferencia y saldo >0
            $cuentaa = DB::table('usuario_cuenta')->
            where('usuario_id','=',$id)->where('cuenta','=',$cuenta_origen)->where('activo','=','1')->get();
            
            $cuentab = DB::table('usuario_cuenta')->
            where('usuario_id','=',$id)->where('cuenta','=',$cuenta_destino)->where('activo','=','1')->get();
            

            $saldo = DB::table('usuario_cuenta')->
            where('cuenta','=',$cuenta_origen)->get();
                      

            if(isset($cuentaa[0]) && isset($cuentab[0])){
                if(intval($saldo[0]->saldo) >=  intval($monto)){

                    $nuevototala = intval($saldo[0]->saldo) - intval($monto);
                    $nuevototalb = intval($cuentab[0]->saldo) + intval($monto) ;

                    $fecha = date('Y-m-d');
                    $transaccion = new Transaccion();
                    $transaccion->cuenta_origen = $cuenta_origen;
                    $transaccion->cuenta_destino = $cuenta_destino;
                    $transaccion->monto = $monto;
                    $transaccion->fecha = $fecha;
                    $transaccion->save();
                   
                    $result1 = DB::table('usuario_cuenta')->where('cuenta', '=',$cuenta_origen)->update(['saldo' => $nuevototala]);
                    $result2 = DB::table('usuario_cuenta')->where('cuenta', '=',$cuenta_destino)->update(['saldo' => $nuevototalb]);
                   
                }else{
                    return 'La cuenta origen no cuenta con saldo suficiente';
                }
            }else{
                return 'Las cuentas no se encuentran activas';
            }
        }else{
            // verificar que la cuenta origen sea del usuario y esten activas y esten marcadas para transferencia y saldo >0
            $cuentaa = DB::table('usuario_cuenta')->
            where('usuario_id','=',$id)->where('cuenta','=',$cuenta_origen)->where('activo','=','1')->get();
            $cuentab = DB::table('usuario_cuenta')->
            where('habilitado_transferencias','=','1')->where('cuenta','=',$cuenta_destino)->where('activo','=','1')->get();
           

            $saldo = DB::table('usuario_cuenta')->
            where('cuenta','=',$cuenta_origen)->get();
             
            
            if(isset($cuentaa[0])){
                if(isset($cuentab[0])){
                    if(intval($saldo[0]->saldo) >=  intval($monto)){
                        $nuevototala = intval($saldo[0]->saldo) - intval($monto);
                        $nuevototalb = intval($cuentab[0]->saldo) + intval($monto) ;

                        $fecha = date('Y-m-d');
                        $transaccion = new Transaccion();
                        $transaccion->cuenta_origen = $cuenta_origen;
                        $transaccion->cuenta_destino = $cuenta_destino;
                        $transaccion->monto = $monto;
                        $transaccion->fecha = $fecha;
                        $transaccion->save();
                       
                        $result1 = DB::table('usuario_cuenta')->where('cuenta', '=',$cuenta_origen)->update(['saldo' => $nuevototala]);
                        $result2 = DB::table('usuario_cuenta')->where('cuenta', '=',$cuenta_destino)->update(['saldo' => $nuevototalb]);
                      
                    }else{
                        return 'La cuenta origen no cuenta con saldo suficiente';
                    }                   
                }else{
                    return 'La cuenta destino no se existe o no se encuentra activa y marcada para transferencias';
                }
            }else{
                return 'La cuenta origen no se encuentra activa';
            }
        }

        



        DB::commit();
        return $transaccion->id;
    }

}
