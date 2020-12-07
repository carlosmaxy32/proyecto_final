<?php

namespace App\Http\Controllers;

use App\Models\Disponible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisponibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Disponible::where('user_id', '=', Auth::id())->exists())
            return redirect(route('disponible.edit', Disponible::select('id')->where('user_id', Auth::id())->first()));       
        else
            return redirect(route('disponible.create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disponibles.disponiblesForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->merge([
            'user_id' => Auth::id()
        ]);
        $request->validate([
            'fechaDe'=>'required|date',
            'fechaA'=>'required|date|after:fechaDe',
            'horaDe'=>'required',
            'horaA'=>'required|after:horaDe',
            'activo'=>'required|numeric',    
        ]);
        Disponible::create($request->all());
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disponible  $disponible
     * @return \Illuminate\Http\Response
     */
 /*   public function show(Disponible $disponible)
*    {
*        //
*    }
*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disponible  $disponible
     * @return \Illuminate\Http\Response
     */
    public function edit(Disponible $disponible)
    {
        if($disponible->user_id == Auth::id())
            return view('disponibles.disponiblesForm', compact('disponible'));
        else
            return redirect(route('disponible.edit', Disponible::select('id')->where('user_id', Auth::id())->first()));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disponible  $disponible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disponible $disponible)
    {
        $request->merge([
            'user_id' => Auth::id()
        ]);
        $request->validate([
            'fechaDe'=>'required|date',
            'fechaA'=>'required|date|after:fechaDe',
            'horaDe'=>'required',
            'horaA'=>'required|after:horaDe',
            'activo'=>'required|numeric',    
        ]);
        Disponible::where('user_id', $disponible->user_id)->update($request->except('_method', '_token'));
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disponible  $disponible
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disponible $disponible)
    {
        //
    }
}
