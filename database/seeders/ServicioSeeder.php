<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Valores necesarios, no borrar*/
        Servicio::insert(['nombre'=> 'Revisión', 'descripcion'=>'El dentista checa el estado de sus dientes']);
        Servicio::insert(['nombre'=> 'Brackets', 'descripcion'=>'El dentista ve si es necesario usar brackets, de ser así, él mismo los coloca o quita']);
        Servicio::insert(['nombre'=> 'Blanqueamiento', 'descripcion'=>'El dentista blanquea sus dientes']);
        Servicio::insert(['nombre'=> 'Muela de juicio', 'descripcion'=>'El dentista saca la muela de juicio']);
        Servicio::insert(['nombre'=> 'Lavado bocal', 'descripcion'=>'El dentista limpia sus dientes']);
        Servicio::insert(['nombre'=> 'Extracción de diente', 'descripcion'=>'El dentista extrae el diente que esté afectando su dentadura']);
        Servicio::insert(['nombre'=> 'Muela o diente picado', 'descripcion'=>'El dentista limpia y tapa el diente o muela picada']);
        Servicio::insert(['nombre'=> 'Implantar diente', 'descripcion'=>'El dentista implanta uno o varios dientes postisos']);

        /*factory para añadir más servicios, si no se haran pruebas mantener comentado*/
        Servicio::factory()->times(10)->create();

    }
}
