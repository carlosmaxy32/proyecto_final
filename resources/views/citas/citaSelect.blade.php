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
                <form action="{{route('make.store') }}"  method="POST">
                        @csrf
                        <select name="contacto_id" class="block mt-1 w-full">
                            @foreach($contactos as $contacto)
                                @foreach($usuarios as $usuario)
                                    @if(Auth::user()->tipousuario == 1)                                        
                                        @if($contacto->dentista_id == $usuario->id)
                                            <option value="{{$contacto->id}}">{{$usuario->nombre_completo}}</option>
                                        @endif
                                    @elseif(Auth::user()->tipousuario == 2) 
                                        @if($contacto->paciente_id == $usuario->id)
                                            <option value="{{$contacto->id}}">{{$usuario->nombre_completo}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach                                        
                        </select>
                        <div class="flex items-center justify-end mt-4" style = "float: right">
                            <x-jet-button type="submit" class="ml-4">
                                {{ __('Siguiente') }}
                            </x-jet-button>
                        </div>
                </form>                
            </div>
        </div>
    </div> 
</x-app-layout>