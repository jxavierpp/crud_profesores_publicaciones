<?php

namespace App\Http\Controllers;

use App\Publicacion;
use App\Profesor;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function index()
    {
        $pubs = Publicacion::with('profesores')->get();
        return view('publicaciones.index', compact('pubs'));
    }

    public function index1($id)
    {   
        $profesor = Profesor::find($id);
        $pubs = $profesor->publicaciones;
        return view('publicaciones.index1', compact('pubs'));
    }


    public function create()
    {
        $profesores = Profesor::all('nombre', 'id');
        return view('publicaciones.create', compact('profesores'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'referencia' => 'required',
            'tipo' => 'required',
            'year' => 'required',
        ));

        $publicacion = new Publicacion();
        $publicacion->referencia = $request->referencia;
        $publicacion->tipo = $request->tipo;
        $publicacion->year = $request->year;
        $publicacion->save();

        //sincroniza las nuevas relaciones, borra las que ya no existen y crea las nuevas
        $publicacion->profesores()->sync($request->ids);

        return redirect()->route('publicaciones.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       // dd($id);
       $publicacion = Publicacion::find($id);
    //    dd($publicacion->profesores()->get());
       $profesores = Profesor::all('nombre', 'id');
       return view('publicaciones.edit', compact('publicacion', 'profesores'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->ids);
        $this->validate($request, array(
            'referencia' => 'required',
            'tipo' => 'required',
            'year' => 'required',
        ));
        $profesores = Profesor::all();
        
        $publicacion = Publicacion::find($id);
        $publicacion->referencia = $request->referencia;
        $publicacion->tipo = $request->tipo;
        $publicacion->year = $request->year;
        $publicacion->save();

        //sincroniza las nuevas relaciones, borra las que ya no existen y crea las nuevas
        $publicacion->profesores()->sync($request->ids);

        return redirect()->route('publicaciones.index');
    }

    public function destroy($id)
    {
        $publicacion = Publicacion::find($id);
        $publicacion->profesores()->detach();
        $publicacion->delete();

        return redirect()->route('publicaciones.index');
    }
}
