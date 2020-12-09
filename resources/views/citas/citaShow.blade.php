<x-app-layout>
<x-slot name="header">
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información Detallada de la cita') }}
        </h2>        
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table>
                    <tr>
                        <th>Aspecto</th>
                        <th>Detalle</th>                        
                    </tr>
                    @foreach($contactos as $contacto)
                        @if($contacto->id == $cita->contacto_id)
                        @foreach($usuarios as $usuario)
                            @if($contacto->paciente_id == $usuario->id)
                            <tr>
                                <td>Nombre Paciente:</td>
                                <td>{{ $usuario->nombre_completo }}</td>                        
                            </tr>  
                            <tr>
                                <td>Teléfono Paciente:</td>
                                <td>{{ $usuario->telefono }}</td>                        
                            </tr>
                            
                            @elseif($contacto->dentista_id == $usuario->id)
                            <tr>
                                <td>Nombre Dentista:</td>
                                <td>{{ $usuario->nombre_completo }}</td>                        
                            </tr>  
                            <tr>
                                <td>Teléfono Dentista:</td>
                                <td>{{ $usuario->telefono }}</td>                        
                            </tr>
                                @foreach($consultorios as $consultorio)
                                @if($consultorio->user_id == $usuario->id)
                                <tr>
                                    <td>Dirección del consultorio:</td>
                                    <td>{{ $consultorio->direccion }}</td>                        
                                </tr>
                                <tr>
                                    <td>Localización:</td>
                                    <td>{{ $consultorio->localizacion }}</td>                        
                                </tr>
                                @endif
                                @endforeach
                            
                            @endif
                        @endforeach
                        
                        @endif
                    @endforeach
                    
                    <tr>
                        <td>Fecha:</td>
                        <td>{{ $cita->fecha }}</td>                        
                    </tr>
                    <tr>
                        <td>Hora:</td>
                        <td>{{ $cita->hora }}</td>                        
                    </tr>
                    <tr>
                        <td>Servicio:</td>
                        <td>{{ $cita->servicio->servicio }}</td>                        
                    </tr>                   
                </table>
                <form action="{{ route('cita.destroy', [$cita] ) }}"  method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="flex items-center justify-end mt-4" style = "float: right">
                            <x-jet-button type="submit" class="ml-4">
                                {{ __('Eliminar') }}
                            </x-jet-button>
                        </div>
                </form>
                <form action="{{ route('cita.edit', [$cita] ) }}"  method="POST">
                        @method('GET')
                        @csrf
                        <div class="flex items-center justify-end mt-4" style = "float: right">
                            <x-jet-button type="submit" class="ml-4">
                                {{ __('Editar') }}
                            </x-jet-button>
                        </div>
                </form>
                <form action="{{ route('cita.index')}}"  method="POST">
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
