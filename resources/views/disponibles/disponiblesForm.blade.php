@if(Auth::user()->tipousuario == 2)
<x-app-layout>
    <x-slot name="header">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Disponibilidad') }}
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if(isset($disponible))
                <form action="{{ route('disponible.update', [$disponible])}}"  method="POST">
                    @method('patch')
            @else
                <form action="{{ route('disponible.store') }}"  method="POST">
            @endif
                    @csrf
                    Nota importante: Si cambió las fechas de disponibilidad y tenía pacientes citados que le afecten este cambio, comuniquese con ellos
                    para informarles sobre el incoveniente, además usted puede cambiarle la fecha de cita en
                    el apartado de citas, siempre y cuando tenga a su paciente informado. 
                    <br> 
                    <br>   
                    <div>
                        <x-jet-label for="fechaDe" value="{{ __('Fecha De') }}" />
                        <x-jet-input id="fechaDe" class="block mt-1 w-full" type="date" name="fechaDe" :value="old('fechaDe') ?? $disponible->fechaDe ?? ''" required/>
                    </div>
                    @error('fechaDe')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror   

                    <div class="mt-4">
                        <x-jet-label for="fechaA" value="{{ __('Fecha A') }}" />
                        <x-jet-input id="fechaA" class="block mt-1 w-full" type="date" min="old('fechaDe')" name="fechaA" :value="old('fechaA') ?? $disponible->fechaA ?? ''"  required />
                    </div>
                    @error('fechaA')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mt-4">
                        <x-jet-label for="horaDe" value="{{ __('Hora De') }}" />
                        <x-jet-input id="horaDe" class="block mt-1 w-full" type="time" name="horaDe" :value="old('horaDe') ?? $disponible->horaDe ?? ''" required />
                    </div>
                    @error('horaDe')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mt-4">
                        <x-jet-label for="horaA" value="{{ __('Hora A') }}" />
                        <x-jet-input id="horaA" class="block mt-1 w-full" type="time" min="old('horaDe')" name="horaA" :value="old('horaA') ?? $disponible->horaA ?? ''" required />
                    </div>
                    @error('horaA')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mt-4">
                        <x-jet-label for="activo" value="{{ __('¿Disponible?') }}" />
                        <select name="activo">
                            <option value="1" selected {{ old('activo') == '1' ? 'selected' : ''}} {{ isset($disponible) && $disponible->activo == '1' ? 'selected' : ''}}>Si</option> 
                            <option value="2" {{ old('activo') == '2' ? 'selected' : ''}} {{ isset($disponible) && $disponible->activo == '2' ? 'selected' : ''}}>No</option>                
                        </select>
                    </div>
                    @error('activo')
                    <div class="alert alert-danger mb-4">{{ $message }}</div>
                    @enderror
                
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Guardar') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</x-app-layout>
@else
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL={{route('dashboard')}}">
@endif