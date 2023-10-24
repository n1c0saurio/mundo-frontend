<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispositivos = Dispositivo
            ::join('bodegas', 'dispositivos.bodega_id', '=', 'bodegas.id')
            ->join('modelos', 'dispositivos.modelo_id', '=', 'modelos.id')
            ->join('marcas', 'modelos.marca_id', '=', 'marcas.id')
            ->get([
                'dispositivos.id as id',
                'dispositivos.nombre as nombre',
                'marcas.nombre as marca',
                'modelos.nombre as modelo',
                'bodegas.nombre as bodega'
            ]);
        return response()->json($dispositivos);
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
    public function show(Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispositivo $dispositivo)
    {
        //
    }
}
