
<x-app-layout>
<x-slot name="header">
<link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información Detallada') }}
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
                    <tr>
                        <td>Nombre:</td>
                        <td>{{ $usuario->name }}</td>                        
                    </tr>  
                    <tr>
                        <td>Apellido Paterno:</td>
                        <td>{{ $usuario->apellidoP }}</td>                        
                    </tr>
                    <tr>
                        <td>Apellido Materno:</td>
                        <td>{{ $usuario->apellidoM }}</td>                        
                    </tr>
                    <tr>
                        <td>Sexo:</td>
                        <td>{{ $usuario->sexo }}</td>                        
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento:</td>
                        <td>{{ $usuario->fechaN }}</td>                        
                    </tr>
                    <tr>
                        <td>Correo Electrónico:</td>
                        <td>{{ $usuario->email }}</td>                        
                    </tr>
                    @if(Auth::user()->tipousuario == 1)
                    <tr>
                        <td>Dirección del Consultorio:</td>
                        <td>{{ $consultorio->direccion }}</td>                        
                    </tr>
                    <tr>
                        <td>Colonia:</td>
                        <td>{{ $consultorio->colonia }}</td>                        
                    </tr>
                    <tr>
                        <td>Municipio:</td>
                        <td>{{ $consultorio->municipio }}</td>                        
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td>{{ $consultorio->estado }}</td>                        
                    </tr>
                    @endif
                   
                </table>
                
                    <form action="{{ route('contactos.destroy', [$contacto]) }}"  method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="flex items-center justify-end mt-4" style = "float: right">
                                <x-jet-button type="submit" class="ml-4">
                                    {{ __('Eliminar') }}
                                </x-jet-button>
                            </div>
                    </form>
                    <form action="{{ route('contactos.index')}}"  method="POST">
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
