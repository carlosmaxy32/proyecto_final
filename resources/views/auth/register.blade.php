<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nombre(s)') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="apellidoP" value="{{ __('Apellido Paterno') }}" />
                <x-jet-input id="apellidoP" class="block mt-1 w-full" type="text" name="apellidoP" :value="old('apellidoP')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="apellidoM" value="{{ __('Apellido Materno') }}" />
                <x-jet-input id="apellidoM" class="block mt-1 w-full" type="text" name="apellidoM" :value="old('apellidoM')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="sexo" value="{{ __('Sexo') }}" />
                <input id="sexoH" type="radio" name="sexo" value="Hombre" {{ old('sexo') == 'Hombre' ? 'checked' : ''}} {{ isset($usuario) && $usuario->sexo == 'Hombre' ? 'checked' : ''}} required />Hombre  <br>
                <input id="sexoM" type="radio" name="sexo" value="Mujer" {{ old('sexo') == 'Mujer' ? 'checked' : ''}} {{ isset($usuario) && $usuario->sexo == 'Mujer' ? 'checked' : ''}} required />Mujer
            </div>

            <div class="mt-4">
                <x-jet-label for="fechaN" value="{{ __('Fecha de Nacimiento') }}" />
                <x-jet-input id="fechaN" class="block mt-1 w-full" type="date" name="fechaN" :value="old('fechaN')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('apellidoM')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
