<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.herramientas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.herramientas.show');
    }
    public function show1()
    {
        return view('admin.herramientas.show1');
    }
    public function show2()
    {
        return view('admin.herramientas.show2');
    }
    public function show3()
    {
        return view('admin.herramientas.show3');
    }
    public function show4()
    {
        return view('admin.herramientas.show4');
    }
}
