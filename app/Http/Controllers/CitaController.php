<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consultorio;
use App\Models\Dentista_paciente;
use App\Models\Disponible;
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
        return view('citas.citaSelect', compact('contactos', 'usuarios'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Cita::create($request->all());        
        return redirect(route('cita.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if(Cita::where('id', $id)->exists())
        {   
            $cita = Cita::find($id);
            $cont = Dentista_paciente::find($cita->contacto_id);
            if(Auth::user()->tipousuario == 1)
                $contactos = Dentista_paciente::where('paciente_id', Auth::id())->get();
            else if(Auth::user()->tipousuario == 2)
                $contactos = Dentista_paciente::where('dentista_id', Auth::id())->get();
            
            foreach($contactos as $con)
            {
                if($con == $cont)
                {
                    $usuarios = User::all();
                    $consultorios = Consultorio::all();        
                    return view('citas.citaShow', compact('contactos', 'consultorios', 'usuarios', 'cita'));
                }
            }
            
        }
        return redirect(route('cita.index')); 
        
        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        if(Cita::where('id', $id)->exists())
        {
            $cita = Cita::find($id);
            $contacto = Dentista_paciente::find($cita->contacto_id);
            if(Auth::user()->tipousuario == 1)
                $contactos = Dentista_paciente::where('paciente_id', Auth::id())->get();
            else if(Auth::user()->tipousuario == 2)
                $contactos = Dentista_paciente::where('dentista_id', Auth::id())->get();
            
            foreach($contactos as $con)
            {
                if($con == $contacto)
                {
                    $disponible = Disponible::where('user_id', $contacto->dentista_id)->first();
                    $servicios = Servicio::all();
                    if(Disponible::where('user_id', $contacto->dentista_id)->exists())
                    {
                        if($disponible->activo == 1)
                            return view('citas.citaForm', compact('cita', 'contacto', 'servicios', 'disponible'));
                    }  
                }
            }            
        }              
        return redirect(route('cita.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $cita=Cita::find($id);
        
        $cita->forceFill([
            'contacto_id' => $request->contacto_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'servicio_id' => $request->servicio_id,
        ])->save();
        return redirect(route('cita.index'));
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
