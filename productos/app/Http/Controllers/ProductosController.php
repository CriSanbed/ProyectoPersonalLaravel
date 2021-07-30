<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    // CREO MI CONSTRUCTOR PARA VALIDAR QUE SE TRABAJE SOLO CUANDO ESTE AUTENTIFICADO
    public function __construct()
    {
        //verificar si hay una instancia para generar una nueva
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $userProductos = Auth::user()->userProductos;
        return view('productos.index')/*->with('userProductos', $userProductos)*/;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    public function detalle()
    {
        return view('productos.detalle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //USO DEL FASAT

        $data = $request->validate([
            'nombre' => 'required|min:6',
            'categoria' => 'required|min:6',
            'paraQuien' => 'required|min:6'

        ]);
        DB::table('productos')->insert([
            'nombre' => $data['nombre'],
            'categoria' => $data['categoria'],
            'paraQuien' => $data['paraQuien']

        ]);
        // NOS DA UNA SIMULACION, PERMITIENDO CAPTURAR LA INFO Q SE ESTA ENVIANDO
        // dd($request->all());

        //REDIRECCIONAMIENTO
        return redirect()->action([ProductosController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

