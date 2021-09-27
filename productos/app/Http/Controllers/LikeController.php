<?php

namespace App\Http\Controllers;


use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
//    public function __construct(){
//        $this->middleware('auth');
//    }

    public function update(Request $request, Productos $producto)
    {
        //almacenar el like del usuario autentificado
        return Auth::user()->iLike()->toggle($producto);
    }


}
