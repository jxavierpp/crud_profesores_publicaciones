<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\Publicacion;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = Profesor::with('publicaciones')->get();
        // dd($profesores);
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'nombre' => 'required',
            'grado' => 'required',
            'year' => 'required',
        ));

        $profesor = new Profesor();
        $profesor->nombre = $request->nombre;
        $profesor->grado = $request->grado;
        $profesor->year = $request->year;
        $profesor->save();

        return redirect()->route('profesores.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // dd($id);
        $profesor = Profesor::find($id);
        return view('profesores.edit', compact('profesor'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $this->validate($request, array(
            'nombre' => 'required',
            'grado' => 'required',
            'year' => 'required',
        ));

        $profesor = Profesor::find($id);
        $profesor->nombre = $request->nombre;
        $profesor->grado = $request->grado;
        $profesor->year = $request->year;
        $profesor->save();

        return redirect()->route('profesores.index');
    }

    public function destroy($id)
    {   
        $profesor = profesor::find($id);
        $profesor->publicaciones()->detach();
        $profesor->delete();

        return redirect()->route('profesores.index');
    }
}
