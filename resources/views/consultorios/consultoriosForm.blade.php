@if(Auth::user()->tipousuario == 2)
<x-app-layout>
    <x-slot name="header">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/heroic-features.css') }}" rel="stylesheet">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información Adicional Consultorio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if(isset($consultorio))
                <form action="{{ route('consultorio.update', [$consultorio])}}"  method="POST">
                    @method('patch')
            @else
                <form action="{{ route('consultorio.store') }}"  method="POST">
            @endif
                    @csrf

                    <div>
                        <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-jet-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion') ?? $consultorio->direccion ?? ''" required autofocus autocomplete="direccion" />
                    </div>
                    @error('direccion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror   

                    <div class="mt-4">
                        <x-jet-label for="colonia" value="{{ __('Colonia') }}" />
                        <x-jet-input id="colonia" class="block mt-1 w-full" type="text" name="colonia" :value="old('colonia') ?? $consultorio->colonia ?? ''"  required />
                    </div>
                    @error('colonia')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mt-4">
                        <x-jet-label for="municipio" value="{{ __('Municipio') }}" />
                        <x-jet-input id="municipio" class="block mt-1 w-full" type="text" name="municipio" :value="old('municipio') ?? $consultorio->municipio ?? ''" required />
                    </div>
                    @error('municipio')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mt-4">
                        <x-jet-label for="estado" value="{{ __('Estado') }}" />
                        <x-jet-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado') ?? $consultorio->estado ?? ''" required />
                    </div>
                    @error('estado')
                    <div class="alert alert-danger">{{ $message }}</div>
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