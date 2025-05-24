<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa = Empresa::all();
        if($empresa)
        {
            return response()->json([
                'success' => true,
                'message' => 'Proceso exitoso',
                'data' => $empresa
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'No hay datos disponibles',
                'data' => ''
            ],400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpresaRequest $request)
    {
        try {
            $empresa = Empresa::create($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Proceso exitoso',
                'data' => $empresa
            ], 200);
        } catch (\Exception $th) {
            report($th);
            return response()->json(['mensaje' => 'No se pudo crear la empresa'], 404);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(int $nit)
    {
        $empresa = Empresa::where('nit', $nit)->firstOrFail();
        if($empresa)
        {
            return response()->json([
                'success' => true,
                'message' => 'Proceso exitoso',
                'data' => $empresa
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'No hay datos disponibles para el id:'. $nit,
                'data' => ''
            ],400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpresaUpdateRequest $request, int $nit)
    {
        try{
            $empresa = Empresa::where('nit', $nit)->firstOrFail();
            $data = $request->validated();
            $empresa->update($data);
            return response()->json([
                'success' => true,
                'message' => 'Proceso exitoso',
                'data' => $empresa
            ],200);
        }catch (\Exception $th) {
            report($th);
            return response()->json([
                'success' => false,
                'message' => 'No se puede actualizar el nit ',
                'data' => ''
            ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $nit)
    {
        $empresa = Empresa::where('nit', $nit)->firstOrFail();
        if ($empresa->estado === 'Inactivo') {
            $empresa->delete();
            return response()->json([
                'success' => true,
                'message' => 'Proceso exitoso',
                'data' => ''
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'La empresa se encuentra activa',
                'data' => $empresa
            ],400);
        }
    }
}
