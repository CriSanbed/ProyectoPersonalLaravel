<?php

namespace App\Http\Controllers;

//use GuzzleHttp\Middleware;
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
        $this->middleware('auth');
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
        DB::table('productos')->insert([
            'nombre' => $data['nombre'],
            'categorias_id' => $data['categoria'],
            'user_id' => Auth::user()->id,
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

