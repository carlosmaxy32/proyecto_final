<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Dentista_paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dentista_pacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipousuario == 1)
            $contactos = Dentista_paciente::where('paciente_id', Auth::id())->get();
        else if(Auth::user()->tipousuario == 2)
            $contactos = Dentista_paciente::where('dentista_id', Auth::id())->get();
        $usuarios = User::all();
        return view('dentistapacientes.dentistapacienteList', compact('contactos', 'usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('tipousuario', 2)->get();
        $consultorios = Consultorio::all();
        
        return view('dentistapacientes.dentistapacienteNew', compact('usuarios', 'consultorios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Dentista_paciente::where('dentista_id', $request->dentista_id)->exists())
            {
                $contA = Dentista_paciente::where('dentista_id', $request->dentista_id)->get();
                if( Dentista_paciente::where('paciente_id', Auth::id())->exists())
                {
                    $contB = Dentista_paciente::where('paciente_id', Auth::id())->get();
                    foreach($contA as $a)
                    {
                        foreach($contB as $b)
                        {
                            if($a->id == $b->id)
                                return redirect(route('contactos.index'))
                                ->with([
                                    'mensaje'=>'Este usuario ya lo tiene agregado',
                                    'alert-type'=>'alert-danger',
                                ]);
                        }
                    }
                }
            }
        
        $request->merge([
            'paciente_id' => Auth::id()
        ]);
        $request->validate([
            'dentista_id'=>'required|numeric',
            'paciente_id'=>'required|numeric',
               
        ]);
        
        Dentista_paciente::create($request->all());
        return redirect(route('contactos.index'))
        ->with([
            'mensaje'=>'Se agregó el usuario exitosamente',
            'alert-type'=>'alert-success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dentista_paciente  $dentista_paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Dentista_paciente $contacto)
    {
        
        if(Auth::user()->tipousuario == 1)
        {
            if(Dentista_paciente::where('dentista_id', $contacto->dentista_id)->exists())
            {
                $contA = Dentista_paciente::where('dentista_id', $contacto->dentista_id)->get();
                if( Dentista_paciente::where('paciente_id', Auth::id())->exists())
                {
                    $contB = Dentista_paciente::where('paciente_id', Auth::id())->get();
                    foreach($contA as $a)
                    {
                        foreach($contB as $b)
                        {
                            if($a->id == $b->id)
                            {
                                if($contacto != $a)
                                    return redirect(route('contactos.index'))
                                    ->with([
                                        'mensaje'=>'No tiene autorización',
                                        'alert-type'=>'alert-danger',
                                    ]);
                                $usuario = User::where('id', $contacto->dentista_id)->first();
                                
                                if(Consultorio::where('user_id', $usuario->id)->exists())
                                {
                                    $existe = 1;
                                    $consultorio = Consultorio::where('user_id', $usuario->id)->first();
                                    return view('dentistapacientes.dentistapacienteShow', compact('contacto', 'usuario', 'consultorio', 'existe'));
                                }
                                else
                                {
                                    $existe = 2;
                                    return view('dentistapacientes.dentistapacienteShow', compact('contacto', 'usuario', 'existe'));
                                }
                            }
                                
                        }
                    }
                }
            }           
        }
        else if(Auth::user()->tipousuario == 2)
        {
            if(Dentista_paciente::where('paciente_id', $contacto->paciente_id)->exists())
            {
                $contA = Dentista_paciente::where('paciente_id', $contacto->paciente_id)->get();
                if( Dentista_paciente::where('dentista_id', Auth::id())->exists())
                {
                    $contB = Dentista_paciente::where('dentista_id', Auth::id())->get();
                    foreach($contA as $a)
                    {
                        foreach($contB as $b)
                        {
                            if($a->id == $b->id)
                            {
                                if($contacto != $a)
                                    return redirect(route('contactos.index'))
                                    ->with([
                                        'mensaje'=>'No tiene autorización',
                                        'alert-type'=>'alert-danger',
                                    ]);
                                $usuario = User::where('id', $contacto->paciente_id)->first();
                                return view('dentistapacientes.dentistapacienteShow', compact('contacto', 'usuario'));
                            }
                                
                        }
                    }
                }
            }
        }
               
        return redirect(route('contactos.index'))
        ->with([
            'mensaje'=>'No tiene autorización',
            'alert-type'=>'alert-danger',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dentista_paciente  $dentista_paciente
     * @return \Illuminate\Http\Response
     */
  /*  public function edit(Dentista_paciente $dentista_paciente)
    {
        //
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dentista_paciente  $dentista_paciente
     * @return \Illuminate\Http\Response
     */
  /*  public function update(Request $request, Dentista_paciente $dentista_paciente)
    {
        //
    }
*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dentista_paciente  $dentista_paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dentista_paciente $contacto)
    {
        
        $contacto->delete();
        return redirect(route('contactos.index'))
        ->with([
            'mensaje'=>'Se eliminó el usuario exitosamente',
            'alert-type'=>'alert-success',
        ]);
    }
}
