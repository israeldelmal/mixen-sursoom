<?php

use Illuminate\Database\Seeder;

class OdooSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('odoo')->insert([
			'header_img'    => 'logo.png',			
			'header_h1'     => 'El software de gestión todo en uno',			
			'about_h1'      => 'Qué hacemos y como lo logramos',			
			'about_content' => '<p>Mejorar el desempeño de cada uno de nuestros clientes a través
			de soluciones tecnológicas innovadoras apegados a nuestros valores
			de calidad y ética preocupados siempre por el éxito de su empresa.</p>
			<p>Por medio del sistema odoo y sus módulos que cumplen con los
			requerimientos presentes y fruturos que una empresa necesita de un
			sistema ERP (planificación de los recursos empresariales) diseñado
			para moldear y automatizar la mayoría de los procesos de la empresa.</p>',
			'about_img'     => 'imagen-1.jpg',
			'clients_h1'    => 'Clientes actuales',
			'apps_h1'       => 'Aplicaciones principales',
			'break_h1'      => 'Se parte del cambio
			Conoce nuestra Metodologia',
			'break_img'     => 'fondo.jpg',
			'meth_h1'       => 'Metodología',
			'created_at'    => date("Y-m-d H:i:s"),
			'updated_at'    => date("Y-m-d H:i:s")
        ]);
    }
}
