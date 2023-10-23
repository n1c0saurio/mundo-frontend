<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return response()->json($marcas); #TODO: falta formato
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
    public function show(Marca $marca)
    {
        return response()->json($marca);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        //
    }

    /**
     * Listar modelos de una marca
     */
    public function listarModelos(Marca $marca)
    {
        $modelos = $marca->modelos()->get();
        return response()->json($modelos); #TODO: falta formato
    }

    /**
     * Listar dispositivos de una marca
     */
    public function listarDispositivos(Marca $marca)
    {
        // $dispositivos = $marca->modelos()->with('dispositivos')->get()->pluck('dispositivos');
        $dispositivos = Marca::with('modelos.dispositivos')->where('id', $marca->id)->get();
        return response()->json($dispositivos); #TODO: falta formato
    }
}
