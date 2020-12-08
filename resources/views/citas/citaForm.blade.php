<x-app-layout>
<x-slot name="header">
<link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">
<link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear cita') }}
        </h2>        
</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(isset($cita))
                    <form action="{{ route('cita.update', [$cita])}}"  method="POST">
                        @method('patch')
                @else
                <form action="{{route('cita.store') }}"  method="POST">
                @endif
                        @csrf
                        <input type="hidden" name="contacto_id" value="{{ $contacto->id}}">
                        <div>
                            <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                            <x-jet-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" min="{{ $disponible->fechaDe }}" max="{{ $disponible->fechaA }}" :value="old('fecha') ?? $cita->fecha ?? ''" required/>
                        </div>
                        @error('fecha')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <br>
                        La horas disponibles es de {{ $disponible->horaDe }} hasta {{ $disponible->horaA}}
                        <div>
                            <x-jet-label for="hora" value="{{ __('Hora') }}" />
                            <x-jet-input id="hora" class="block mt-1 w-full" type="time" name="hora" min="{{ $disponible->horaDe }}" max="{{ $disponible->horaA }}" step="3600" :value="old('hora') ?? $cita->hora ?? ''" required/>
                        </div>
                        @error('hora')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <x-jet-label for="servicio_id" value="{{ __('Servicio') }}" />
                        <select name="servicio_id">
                            @foreach($servicios as $servicio)
                                <option value="{{$servicio->id}}" {{ old('servicio_id') == $servicio->id ? 'selected' : ''}} {{ isset($cita) && $cita->servicio_id == $servicio->id ? 'selected' : ''}}>{{$servicio->servicio}}</option>                                       
                            @endforeach                                        
                        </select>
                        <div class="flex items-center justify-end mt-4" style = "float: right">
                            <x-jet-button type="submit" class="ml-4">
                                {{ __('Guardar cita') }}
                            </x-jet-button>
                        </div>
                </form>                
            </div>
        </div>
    </div> 
</x-app-layout>