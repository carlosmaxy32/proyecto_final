<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Consultorio::where('user_id', '=', Auth::id())->exists())
            return redirect(route('consultorio.edit', Consultorio::select('id')->where('user_id', Auth::id())->first()));       
        else
            return redirect(route('consultorio.create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('consultorios.consultoriosForm');
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
            'direccion'=>'required|min:2|max:255|string',
            'colonia'=>'required|min:2|max:40|regex:/^[a-zA-Z\s]+$/u',
            'municipio'=>'required|min:2|max:40|regex:/^[a-zA-Z\s]+$/u',
            'estado'=>'required|min:5|max:40|regex:/^[a-zA-Z\s]+$/u',    
        ]);
        Consultorio::create($request->all());
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     
    *public function show(Consultorio $consultorio)
    *{
    *    //
    *}
    */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultorio $consultorio)
    {
        if($consultorio->user_id == Auth::id())
            return view('consultorios.consultoriosForm', compact('consultorio'));
        else
            return redirect(route('consultorio.edit', Consultorio::select('id')->where('user_id', Auth::id())->first()));       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultorio $consultorio)
    {
        $request->merge([
            'user_id' => Auth::id()
        ]);
        $request->validate([
            'direccion'=>'required|min:2|max:255|string',
            'colonia'=>'required|min:2|max:40|regex:/^[a-zA-Z\s]+$/u',
            'municipio'=>'required|min:2|max:40|regex:/^[a-zA-Z\s]+$/u',
            'estado'=>'required|min:5|max:40|regex:/^[a-zA-Z\s]+$/u',    
        ]);

        $consultorio->forceFill([
            'user_id' => $request->user_id,
            'direccion' => $request->direccion,
            'colonia' => $request->colonia,
            'municipio' => $request->municipio,
            'estado' => $request->estado,            
        ])->save();
        //Consultorio::where('user_id', $consultorio->user_id)->update($request->except('_method', '_token'));
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
   /** public function destroy(Consultorio $consultorio)
    * {
    *     //
    *}
    */
}
