<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consultorio;
use App\Models\Dentista_paciente;
use App\Models\User;
use App\Models\Servicio;
use App\Policies\CitaPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Descomentar paraaplicar politica */
        //$this->authorize('index', Cita::class);
        if(Auth::user()->tipousuario == 1)
            $contactos = Dentista_paciente::where('paciente_id', Auth::id())->get();
        else if(Auth::user()->tipousuario == 2)
            $contactos = Dentista_paciente::where('dentista_id', Auth::id())->get();
        $usuarios = User::all();
        $citas = Cita::with('servicio')->get(); //Eager Loading
        return view('citas.citaList', compact('contactos', 'usuarios', 'citas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Descomentar paraaplicar politica */
        //$this->authorize('index', Cita::class);
        if(Auth::user()->tipousuario == 1)
            $contactos = Dentista_paciente::where('paciente_id', Auth::id())->get();
        else if(Auth::user()->tipousuario == 2)
            $contactos = Dentista_paciente::where('dentista_id', Auth::id())->get();
        $usuarios = User::all();
        $servicios = Servicio::all();
        return view('citas.citaList', compact('contactos', 'usuarios', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $cita = Cita::find($id);
        
        if(Auth::user()->tipousuario == 1)
            $contactos = Dentista_paciente::where('paciente_id', Auth::id())->get();
        else if(Auth::user()->tipousuario == 2)
            $contactos = Dentista_paciente::where('dentista_id', Auth::id())->get();
        $usuarios = User::all();
        $consultorios = Consultorio::all();
        
        return view('citas.citaShow', compact('contactos', 'consultorios', 'usuarios', 'cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        return redirect(route('cita.index'));
    }
}
