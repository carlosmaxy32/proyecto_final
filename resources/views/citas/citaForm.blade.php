<x-app-layout>
<x-slot name="header">
<link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elige su contacto') }}
        </h2>        
</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{route('cita.store') }}"  method="POST">
                        @csrf
                        <input type="hidden" name="contacto_id" value="{{ $contacto->id}}">
                        <div>
                            <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                            <x-jet-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" min="{{ $disponible->fechaDe }}" max="{{ $disponible->fechaA }}" :value="old('fecha') ?? ''" required/>
                        </div>
                        <br>
                        La horas disponibles es de {{ $disponible->horaDe }} hasta {{ $disponible->horaA}}
                        <div>
                            <x-jet-label for="hora" value="{{ __('Hora') }}" />
                            <x-jet-input id="hora" class="block mt-1 w-full" type="time" name="hora" min="{{ $disponible->horaDe }}" max="{{ $disponible->horaA }}" step="3600" :value="old('hora') ?? ''" required/>
                        </div>
                        <x-jet-label for="servicio_id" value="{{ __('Servicio') }}" />
                        <select name="servicio_id">
                            @foreach($servicios as $servicio)
                                <option value="{{$servicio->id}}">{{$servicio->servicio}}</option>                                       
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