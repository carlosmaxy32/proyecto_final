@if(session()->has('mensaje'))
    <div class="alert {{ session('alert-type', 'alert-info') }} alert-dismissible" id="boton">
        <button type="button" class="close" data-dismiss="alert" onClick="boton.remove()">x</button>
        {{ session('mensaje') }}
    </div>
@endif