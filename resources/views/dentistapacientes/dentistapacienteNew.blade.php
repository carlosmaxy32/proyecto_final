@if(Auth::user()->tipousuario == 1)
<x-app-layout>
<x-slot name="header">
<link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Dentistas') }}
        </h2>        
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Teléfono</th>
                        <th>Colonia</th>
                        <th>Municipio</th>
                        <th>Estado</th>
                    </tr>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->apellidoP }}</td>
                        <td>{{ $usuario->apellidoM }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        @foreach($consultorios as $consultorio)
                            @if($usuario->id == $consultorio->user_id)
                            <td>{{ $consultorio->colonia }}</td>
                            <td>{{ $consultorio->municipio }}</td>
                            <td>{{ $consultorio->estado }}</td>
                            @endif
                        @endforeach
                        <td>
                            <form action="{{ route('contactos.store') }}"  method="POST">
                                @csrf
                                <input type="hidden" name="dentista_id" value="{{ $usuario->id }}">
                                <input type="hidden" name="paciente_id" value="{{ Auth::id() }}">
                                <div class="flex items-center justify-end mt-4" text-align="center">
                                    <x-jet-button class="ml-4">
                                        {{ __('Agregar') }}
                                    </x-jet-button>
                                </div>
                            </form>

                        </td>
                    </tr>  
                   @endforeach
                </table>
            </div>
        </div>
    </div> 
</x-app-layout>
@else
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL={{route('dashboard')}}">
@endif