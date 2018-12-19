<?php

use Illuminate\Database\Seeder;

class GBATableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gba')->insert([
			'header_h1'     => 'Nos dedicamos a ofrecer herramientas
			informáticas para integrar procesos.',
			'header_sub'    => 'reducir costos, ahorrar tiempo y obtener información para
			tomar las mejores decisiones en la gestión y el crecimiento
			de su empresa.',
			'header_logo'   => 'logo.png',
			'header_img'    => 'fondo.jpg',
			'about_h1'      => 'Qué hacemos y como lo logramos',
			'about_content' => '<p>Mejorar el desempeño de cada uno de nuestros clientes a través
			de soluciones tecnológicas innovadoras apegados a nuestros valores
			de calidad y ética preocupados siempre por el éxito de su empresa.</p>
			<p>Por medio del sistema odoo y sus módulos que cumplen con los
			requerimientos presentes y fruturos que una empresa necesita de un
			sistema ERP (planificación de los recursos empresariales) diseñado
			para moldear y automatizar la mayoría de los procesos de la empresa.</p>',
			'about_img'     => 'imagen-1.jpg',
			'break_h1'      => 'Oportunidades de trabajar con:',
			'break_img'     => 'fondo.jpg',
			'solutions_h1'  => 'Soluciones',
			'solutions_sub' => 'Paquetes de Gestión de Negocios:',
			'sistems_h1'    => 'Conoce nuestros tipos de sistemas',
			'sistems_img'   => 'fondo.jpg',
			'created_at'    => date("Y-m-d H:i:s"),
			'updated_at'    => date("Y-m-d H:i:s")
        ]);
    }
}
