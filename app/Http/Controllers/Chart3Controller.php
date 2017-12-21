<?php

namespace App\Http\Controllers;
use App\DetalleEncuestaUsuario;
use App\Indicador;
use App\Encuesta;
use DB;
use Illuminate\Http\Request;

class Chart3Controller extends Controller
{//Respuestas Positivas a nivel General por Modelo Basico
    public function index()
    {
        $users = DB::table('detalle_encuesta_usuarios')
            ->select(DB::raw('count(*) as user_count,detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta'),'indicadors.descripcion')
            -> join ('indicadors' , 'indicadors.id' ,'=','detalle_encuesta_usuarios.idindicador')
            -> join ('encuestas' , 'encuestas.id' ,'=','detalle_encuesta_usuarios.idencuesta')
            ->where('indicadors.idmodelo','=',1)
            ->where('detalle_encuesta_usuarios.respuesta','=','si')
            ->groupBy('detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta','indicadors.descripcion')
            ->get();

        return view('chart3',['users'=>$users]);

    }
    public function show($idindicador)
    {
        $resultados = DB::select('select * from indicador where id in (select idindicador from detalle_encuesta_usuarios where idindicador='.$idindicador.' group by idindicador)');

        return view('gestionarreporte.show',compact('resultados','idindicador'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
    }
}
