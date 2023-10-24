<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelos = Modelo::all();
        return response()->json($modelos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelo $modelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
        //
    }

    /**
     * Listar modelos por marca
     */
    public function listarPorMarca($marca_id)
    {
        $modelos = Modelo::where('marca_id', $marca_id)->get(['id', 'nombre']);
        return response()->json($modelos);
    }

    /**
     * Listar dispositivos asociados a un modelo
     */
    public function listarDispositivos(Modelo $modelo)
    {
        $dispositivos = $modelo->dispositivos()->get(['id', 'nombre']);
        return response()->json($dispositivos);
    }
}
