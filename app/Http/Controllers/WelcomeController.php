<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Obtener las imágenes del carrusel

        // Pasar las imágenes a la vista
        return view('welcome');
    }   
}
