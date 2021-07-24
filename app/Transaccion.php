<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transaccion extends Model
{
    protected $fillable = ['cuenta_origen', 'cuenta_destino', 'monto' , 'fecha'];
    protected $primaryKey = 'id';
    protected $table = 'transacciones';
    const UPDATED_AT = null;
    const CREATED_AT = null;
}
