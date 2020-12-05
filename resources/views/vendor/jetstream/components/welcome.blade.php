<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        ¡Bienvenido!
    </div>
    
    
    @if(Auth::user()->tipousuario == 1)
    <div class="mt-6 text-gray-500">
        En esta aplicación usted puede crear, modificar y eliminar citas a nuestros dentistas registrados, pero primero 
        debe asegurarse que tenga agregados dentistas en su repositorio Mis Dentistas.
        <br>
        El precio de los servicios depende del dentista, comuniquese con su dentista para recibir esta información.  
    </div>
    @elseif(Auth::user()->tipousuario == 2)
    <div class="mt-6 text-gray-500">
        Usted como dentista debe llenar los campos "Información Adicional" y "Disponibilidad" para que el 
        paciente pueda agendar citas con usted.
        <br>
        Usted puede crear, modificar y eliminar citas vinculadas a usted. 
        Notifique al paciente de cambios si así lo hace.  
    </div>
   @endif
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Citas</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                En este apartado usted podrá ver una lista de todas sus citas.
            </div>

            <a href="https://laravel.com/docs">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Ir a citas</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        
        <div class="flex items-center">
            @if(Auth::user()->tipousuario == 1)
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Mis Dentistas</a></div>
            @elseif(Auth::user()->tipousuario == 2)
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Mis Pacientes</a></div>
            @endif
        </div>

        <div class="ml-12">
            @if(Auth::user()->tipousuario == 1)
            <div class="mt-2 text-sm text-gray-500">
                En este apartado usted podra ver el listado de sus dentistas.
            </div>
            @elseif(Auth::user()->tipousuario == 2)
            <div class="mt-2 text-sm text-gray-500">
                En este apartado usted podra ver el listado de sus pacientes.
                <br>
                Nota: Usted no podrá ver pacientes hasta que uno de ellos lo agregue a usted en su listado de mis dentistas.
            </div>
            @endif
            <a href="https://laracasts.com">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        @if(Auth::user()->tipousuario == 1)
                        <div>Ir a mis dentistas</div>
                        @elseif(Auth::user()->tipousuario == 2)
                        <div>Ir a mis pacientes</div>
                        @endif
                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>
    @if(Auth::user()->tipousuario == 2)
    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('consultorio.index') }}">Información Adicional</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                En este apartado debe llenar la información adicional de su consultorio, datos como la dirección, 
                colonia, municipio y estado.
            </div>

            <a href="{{ route('consultorio.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Ir a información adicional</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Disponibilidad</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                En este apartado usted puede proponer el rango de días disponibles para la consulta, así como su rango
                de horas.
                <br>
                Nota: Hay que estar actualizando esta información constantemente.
            </div>

            <a href="https://laravel.com/docs">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Ir a disponibilidad</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>
    @endif
</div>
