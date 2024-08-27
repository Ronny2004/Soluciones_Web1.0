<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Crea una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Asegura que el usuario esté autenticado
    }

    /**
     * Muestra la vista de inicio (home).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home'); // Asegúrate de tener una vista llamada 'home.blade.php'
    }
}
