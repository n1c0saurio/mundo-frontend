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
        $marcas = Marca::all(['id', 'nombre']);
        return response()->json($marcas);
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
        $modelos = $marca->modelos()
            ->join('marcas', 'modelos.marca_id', '=', 'marcas.id')
            ->get([
                'modelos.id as id',
                'modelos.nombre as nombre',
                'marcas.nombre as marca'
            ]);
        return response()->json($modelos);
    }

    /**
     * Listar dispositivos de una marca
     */
    public function listarDispositivos(Marca $marca)
    {
        $dispositivos = Marca::where('marcas.id', $marca->id)
            ->join('modelos', 'marcas.id', '=', 'modelos.marca_id')
            ->join('dispositivos', 'modelos.id', '=', 'dispositivos.modelo_id')
            ->get([
                'dispositivos.id as id',
                'dispositivos.nombre as nombre',
                'marcas.nombre as marca',
                'modelos.nombre as modelo'
            ]);
        return response()->json($dispositivos);
    }
}
