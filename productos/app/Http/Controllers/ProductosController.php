<?php

namespace App\Http\Controllers;

//use GuzzleHttp\Middleware;
use App\Models\Producto;
use App\Models\Productos;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductosController extends Controller
{
    // CREO MI CONSTRUCTOR PARA VALIDAR QUE SE TRABAJE SOLO CUANDO ESTE AUTENTIFICADO
    public function __construct()
    {
        //verificar si hay una instancia para generar una nueva
        $this->middleware('auth', ['except'=>'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $userProductos = Auth::user()->userProductos;
        return view('productos.index')->with('userProductos', $userProductos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //OBTENER SIN MODELO
        /*$categorias = DB::table('categorias')->get()->pluck('nombre', 'id');
        return view('productos.create')->with('categorias', $categorias);*/

        //OBTENER CON MODELO
        $categorias = Categoria::all(['id','nombre']);
        return view('productos.create')->with('categorias', $categorias);


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

        //USO DEL FACADE
        $data = $request->validate([
            'nombre' => 'required|min:6',
            'categoria' => 'required',
            'paraQuien' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image'

        ]);

        //ruta imagen
        $ruta_imagen = $request['imagen']->store('upload-productos', 'public');
        //redimensionando la imagen
        $img = Image::make(public_path("storage/$ruta_imagen"))->fit(500, 250);
        $img->save();

        //INSERTANDO REGISTROS SIN MODELO
        /*DB::table('productos')->insert([
            'nombre' => $data['nombre'],
            'categorias_id' => $data['categoria'],
            'user_id' => Auth::user()->id,
            'paraQuien' => $data['paraQuien'],
            'descripcion' => $data['descripcion'],
            'imagen' => $ruta_imagen,

        ]);*/

        //INSERTANDO REGISTROS CON MODELO A PARTIR DEL USUARIO AUTENTIFICADO
        Auth::user()->userProductos()->create([
            'nombre' => $data['nombre'],
            'categorias_id' => $data['categoria'],
            'paraQuien' => $data['paraQuien'],
            'descripcion' => $data['descripcion'],
            'imagen' => $ruta_imagen,
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
    public function show(Productos $producto)
    {
        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $producto)
    {
        $categorias = Categoria::all(['id', 'nombre']);
        return view('productos.edit')->with('categorias', $categorias)
            ->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $producto)
    {
        $data = $request->validate([
            'nombre' => 'required|min:6',
            'categorias' => 'required',
            'paraQuien' => 'required',
            'descripcion' => 'required',

        ]);

//       ASIGNAR VALORES
//       DATA RECIBE NOMBRE QUE ES EL NOMBRE QUE PUSE EN LOS ID DEL EDIT RECETA
        $producto->nombre = $data['nombre'];
        $producto->categorias_id = $data['categorias'];
        $producto->paraQuien = $data['paraQuien'];
        $producto->descripcion = $data['descripcion'];
//        NUEVA IMAGEN
        if (request('imagen')) {
//            guardar la imagen en nuestro store
            $ruta_imagen = $request['imagen']->store('upload-productos', 'public');
//            despues aplicanos estilo
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(500, 250);
            $img->save();
            $producto->imagen = $ruta_imagen;
        }

//        GUARDAR INFO
        $producto->save();

        //REDIRECCIONAR
        return redirect()->action([ProductosController::class, 'index']);
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

