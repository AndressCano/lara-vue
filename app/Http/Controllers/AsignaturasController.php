<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignaturas;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Asignaturas::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'semestre' => 'required|integer',
            'nombre' => 'required|string',
            'cantidad_creditos' => 'required|integer',
            'docente' => 'required|string',
            'asignatura_pre' => 'required|string',
            'horas_aut' => 'required|integer',
            'horas_dir' => 'required|integer'
        ]);

        Asignaturas::create([
            'semestre' => $request->semestre,
            'nombre' => $request->nombre,
            'cantidad_creditos' => $request->cantidad_creditos,
            'docente' => $request->docente,
            'asignatura_pre' => $request->asignatura_pre,
            'horas_aut' => $request->horas_aut,
            'horas_dir' => $request->horas_dir
        ]);

        return response()->json([
            'message' => 'Nueva asignatura creada!'
        ], 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Asignaturas::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'semestre' => 'required|integer',
            'nombre' => 'required|string',
            'cantidad_creditos' => 'required|integer',
            'docente' => 'required|string',
            'asignatura_pre' => 'required|string',
            'horas_aut' => 'required|integer',
            'horas_dir' => 'required|integer'
        ]);

        $asignatura = Asignaturas::find($id);

        if (!is_null($asignatura)) 
        {
            $asignatura->semestre = $request->semestre;
            $asignatura->nombre = $request->nombre;
            $asignatura->cantidad_creditos = $request->cantidad_creditos;
            $asignatura->docente = $request->docente;
            $asignatura->asignatura_pre = $request->asignatura_pre;
            $asignatura->horas_aut = $request->horas_aut;
            $asignatura->horas_dir = $request->horas_dir;
            $asignatura->save();

            return response()->json([
                'message' => 'Asignatura actualizada!'
            ], 201);
        }
        
        return response()->json([
            'message' => 'Asignatura no existe!'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asignaturas::destroy($id);

        return response()->json([
            'message' => 'Asignatura eliminada!'
        ], 202); 
    }
}
