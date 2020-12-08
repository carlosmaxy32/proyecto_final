<x-app-layout>
<x-slot name="header">
<link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">
        @if(Auth::user()->tipousuario == 1)
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Dentistas') }}
        </h2>
        @elseif(Auth::user()->tipousuario == 2)
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Pacientes') }}
        </h2>
        @endif
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <table>
                    <tr>
                        <th>Nombre Paciente</th>                        
                        <th>Nombre Dentista</th>                        
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Servicio</th>
                    </tr>
                   
                   @foreach($citas as $cita)
                        @foreach($contactos as $contacto)
                            @if($cita->contacto_id == $contacto->id)
                            <tr>
                                @foreach($usuarios as $usuario)
                                    @if($usuario->id == $contacto->paciente_id)
                                        <td>{{ $usuario->nombre_completo }}</td>     
                                    @endif
                                @endforeach    
                                @foreach($usuarios as $usuario)       
                                    @if($usuario->id == $contacto->dentista_id)
                                        <td>{{ $usuario->nombre_completo }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $cita->fecha }} </td>
                                <td>{{ $cita->hora }}</td>
                                <td>{{ $cita->servicio->servicio }}</td>
                                <td><a href="{{ route('cita.show', [$cita]) }}">Click aquí para detalles</a></td>
                            </tr>
                            @endif
                        @endforeach    
                   @endforeach
                </table>
                
                
                <form action="{{ route('cita.create')}}"  method="POST">
                    @method('GET')                        
                    <div class="flex items-center justify-end mt-4" style = "float: right">
                        <x-jet-button class="ml-4">
                            {{ __('Nueva cita') }}
                        </x-jet-button>
                    </div>
                </form>
                
                <form action="{{ route('dashboard')}}"  method="POST">
                    @method('GET')    
                    <div class="flex items-center justify-end mt-4" style = "float: right">
                        <x-jet-button class="ml-4">
                            {{ __('Atras') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</x-app-layout>