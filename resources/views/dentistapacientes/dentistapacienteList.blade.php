<x-app-layout>
<x-slot name="header">
<link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
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
            
                Selecciona el nombre del usuario para ver más detalles.
                <br>
                
               <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Teléfono</th>
                    </tr>
                    
                   @foreach($contactos as $contacto)
                        @foreach($usuarios as $usuario)
                            @if(Auth::user()->tipousuario == 1)
                                @if($contacto->dentista_id == $usuario->id)
                                <tr>
                                    <td><a href="{{ route('contactos.show', [$contacto->id]) }}">{{ $usuario->name }}</a></td>
                                    <td>{{ $usuario->apellidoP }}</td>
                                    <td>{{ $usuario->apellidoM }}</td>
                                    <td>{{ $usuario->telefono }}</td>
                                </tr>
                                @endif
                            @elseif(Auth::user()->tipousuario == 2)
                                @if($contacto->paciente_id == $usuario->id)
                                <tr>
                                    <td><a href="{{ route('contactos.show', [$contacto->id]) }}">{{ $usuario->name }}</a></td>
                                    <td>{{ $usuario->apellidoP }}</td>
                                    <td>{{ $usuario->apellidoM }}</td>
                                    <td>{{ $usuario->telefono }}</td>
                                </tr>
                                @endif
                            @endif

                        @endforeach    
                   @endforeach
                </table>
                
                @if(Auth::user()->tipousuario == 1)
                <form action="{{ route('contactos.create')}}"  method="POST">
                    @method('GET')                        
                    <div class="flex items-center justify-end mt-4" style = "float: right">
                        <x-jet-button class="ml-4">
                            {{ __('Nuevo') }}
                        </x-jet-button>
                    </div>
                </form>
                @endif
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