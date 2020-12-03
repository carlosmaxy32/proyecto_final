<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualice la información de su perfil.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Nombre -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre(s)') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <!-- Apellido Paterno -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="apellidoP" value="{{ __('Apellido Paterno') }}" />
            <x-jet-input id="apellidoP" type="text" class="mt-1 block w-full" wire:model.defer="state.apellidoP" autocomplete="apellidoP" />
            <x-jet-input-error for="apellidoP" class="mt-2" />
        </div>
        <!-- Apellido Materno -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="apellidoM" value="{{ __('Apellido Materno') }}" />
            <x-jet-input id="apellidoM" type="text" class="mt-1 block w-full" wire:model.defer="state.apellidoM" autocomplete="apellidoM" />
            <x-jet-input-error for="apellidoM" class="mt-2" />
        </div>
        <!-- Sexo -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="sexo" value="{{ __('Sexo') }}" />
            <input id="sexoH" type="radio" value="Hombre" {{$state['sexo'] == 'Hombre' ? 'checked' :''}} wire:model.defer="state.sexo" name="sexo" >Hombre <br>
            <input id="sexoM" type="radio" value="Mujer" {{$state['sexo'] == 'Mujer' ? 'checked' :''}} wire:model.defer="state.sexo" name="sexo" >Mujer
            <x-jet-input-error for="sexo" class="mt-2" />
            
        </div>
        <!-- Fecha Nacimiento -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="fechaN" value="{{ __('Fecha de Nacimiento') }}" />
            <x-jet-input id="fechaN" type="date" class="mt-1 block w-full" wire:model.defer="state.fechaN" autocomplete="fechaN" />
            <x-jet-input-error for="fechaN" class="mt-2" />
        </div>
        <!-- Teléfono -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
            <x-jet-input id="telefono" type="text" class="mt-1 block w-full" wire:model.defer="state.telefono" autocomplete="telefono" />
            <x-jet-input-error for="telefono" class="mt-2" />
        </div>
        <!-- Correo -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>