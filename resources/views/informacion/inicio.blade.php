@extends('layouts.fondo')

@section('contenido')
<style>
.masthead {
  position: relative;
  width: 100%;
  height: auto;
  min-height: 35rem;
  padding: 15rem 0;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000000 100%), url("{{ asset('img/inicio.png') }}");
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: cover;
}
</style>
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Dental House</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">El lugar para citas entre pacientes y dentistas.</h2>
                <a class="btn btn-primary js-scroll-trigger" href="#about">Empezar</a>
            </div>
        </div>
    </header>

    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <img src="{{ asset('img/logo.png') }}" height="155" width="100">
                    <h2 class="text-white mb-4">Acerca de nosotros</h2>
                    <p class="text-white-50">
                        Somos una organización distribuida por toda la republica mexicana dispuestos a ofrecer
                        atención a nuestros pacientes. Creamos esta plataforma para facilitar y tener un control de 
                        citas entre dentistas y pacientes.
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="assets/img/principal.png" alt="" />
        </div>
    </section>
        <!-- Contact-->
        <section class="contact-section bg-black" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Dirección</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">Juárez 492, Santa Anita, Jalisco</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Correo electrónico</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="#!">dentalhouseofocial@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Teléfono</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">(33) 1647 2020</div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <br>
                <br>
                <br>
            </div>
        </section>
@endsection