<?php

namespace App\Http\Controllers;

use App\DetalleEncuestaUsuario;
use App\Indicador;
use App\Encuesta;
use DB;
use Illuminate\Http\Request;

class Chart7Controller extends Controller
{//Respuestas positiva nivel General por Modelo Repetible
    public function index()
    {
        $users = DB::table('detalle_encuesta_usuarios')
            ->select(DB::raw('count(*) as user_count,detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta'),'indicadors.descripcion')
            -> join ('indicadors' , 'indicadors.id' ,'=','detalle_encuesta_usuarios.idindicador')
            -> join ('encuestas' , 'encuestas.id' ,'=','detalle_encuesta_usuarios.idencuesta')
            ->where('indicadors.idmodelo','=',3)
            ->where('detalle_encuesta_usuarios.respuesta','=','si')
            ->groupBy('detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta','indicadors.descripcion')
            ->get();

        return view('chart7',['users'=>$users]);

    }
}
