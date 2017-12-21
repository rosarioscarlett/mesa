<?php

namespace App\Http\Controllers;

use App\Facultad;
use App\User;
use DB;
use Illuminate\Http\Request;

class Chart2Controller extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->select(DB::raw('count(*) as user_count,users.idfacultad','facultads.descripcion'))
            -> join ('facultads' , 'facultad.id' ,'=','users.idfacultad')
            ->groupBy('users.idfacultad','facultads.descripcion')
            ->get();

        return view('chart',['consulta'=>$users]);

    }

    public function create()
    {

    }
    public function store(Request $request)
    {
    }
}
