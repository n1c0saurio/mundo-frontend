<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodegas = Bodega::all();
        return response()->json($bodegas);
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
    public function show(Bodega $bodega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bodega $bodega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bodega $bodega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bodega $bodega)
    {
        //
    }

    /**
     * Listar dispositivos existentes en una bodega
     */
    public function listarDispositivos(Bodega $bodega)
    {
        $dispositivos = $bodega->dispositivos()
            ->join('modelos', 'modelos.id', '=', 'dispositivos.modelo_id')
            ->join('marcas', 'marcas.id', '=', 'modelos.marca_id')
            ->get([
                'dispositivos.id as id',
                'dispositivos.nombre as nombre',
                'modelos.nombre as modelo',
                'marcas.nombre as marcas'
            ]);
        return response()->json($dispositivos);
    }
}
