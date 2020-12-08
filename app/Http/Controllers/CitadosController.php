<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consultorio;
use App\Models\Dentista_paciente;
use App\Models\Disponible;
use App\Models\User;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function create()
    {
        //
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $id)
    {
        if($id->contacto_id == null)
        {
            if(Auth::user()->tipousuario == 1)
                return redirect(route('cita.index'))
                ->with([
                    'mensaje'=>'Agregue dentistas en su lista de Mis Dentistas',
                    'alert-type'=>'alert-danger',
                ]);
            else if(Auth::user()->tipousuario == 2)
                return redirect(route('cita.index'))
                ->with([
                    'mensaje'=>'Asegurese que tiene pacientes en su lista de Mis Pacientes',
                    'alert-type'=>'alert-danger',
                ]);
        }
            
        $contacto = Dentista_paciente::find($id->contacto_id);
        $disponible = Disponible::where('user_id', $contacto->dentista_id)->first();
        $servicios = Servicio::all();
        if(Disponible::where('user_id', $contacto->dentista_id)->exists())
        {
            if($disponible->activo == 1)
                return view('citas.citaForm', compact('contacto', 'servicios', 'disponible'));
        }        
        return redirect(route('cita.index'))
        ->with([
            'mensaje'=>'Dentista no disponible',
            'alert-type'=>'alert-danger',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
/*    public function show(Cita $cita)
    {
        //
    }
*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
/*    public function edit(Cita $cita)
    {
        //
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
/*    public function update(Request $request, Cita $cita)
    {
        //
    }
*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
 /*   public function destroy(Cita $cita)
    {
        //
    }*/
}
