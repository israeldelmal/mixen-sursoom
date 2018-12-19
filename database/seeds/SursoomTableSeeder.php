<?php

use Illuminate\Database\Seeder;

class SursoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sursoom')->insert([
			'img_1'          => 'fondo.jpg',
			'img_2'          => 'imagen-1.jpg',
			'img_3'          => 'fondo.jpg',
			'img_4'          => 'fondo-1.jpg',
			'img_5'          => 'fondo-2.jpg',
			'img_6'          => 'fondo.jpg',
			'header_h1'      => 'Trabaja en equipo, mejora procesos,
			multiplica resultados…',
			'header_sub'     => 'La relación con nuestros clientes
			está basada en la confianza y altos estándares de ética
			que garantizan los resultados en cada proyecto.',
			'about_h1'       => 'Nosotros',
			'about_content'  => '<p>Somos Socios de Odoo desde 2016 convencidos de que el sistema ERP Odoo 
			cuenta con las aplicaciones y soluciones que las Empresas, Negocios, Sector 
			Educativo, Gobierno y Sector Servicios necesitan para alcanzar sus objetivos.</p>
			<p>Somos usuarios de Odoo desde 2014 lo que nos ha permitido mejorar nuestros 
			procesos operativos y administrativos por lo que hemos alcanzado un crecimiento 
			sostenido mediante el cumplimiento de los proyectos y un excelente servicio 
			hacia nuestros clientes.</p>',
			'break_h1'       => 'Te ayudamos a crear un plan personalizado
			para tu empresa',
			'products_h1'    => 'Productos',
			'products_sub'   => 'Cada negocio es diferente, con Odoo puedes seleccionar uno de los planes que tenemos preconfigurados, o bien, podemos preparar un plan a la medida de tu negocio.',
			'docs_h1'        => 'Mejora la administración de
			tu negocio con Odoo',
			'docs_content_1' => '<ul>
			<li>Minimiza el ciclo en el proceso de compras, inventarios y cuentas por pagar.</li>
			<li>Administra tus inventarios protegiendo tus inversiones.</li>
			<li>Mejora tu proceso de ventas obteniendo más oportunidades de negocio, cierre de ventas, y cumplimientos legales de facturación y emisión de comprobantes de pagos de forma simple y oportuna.</li>
			<li>Utiliza las herramientas de comunicación para avisos, mensajes directos, envío automático de emails, tareas y seguimiento para mantener a tus equipos de trabajo integrados.</li>
			</ul>',
			'docs_h2'        => 'Producción y calidad',
			'docs_content_2' => '<ul>
			<li>Optimiza tus niveles de inventario</li>
			<li>Controla los costos de producción</li>
			<li>Estandariza las operaciones productivas</li>
			<li>Programa y monitorea el cumplimiento de las metas de producción</li>
			<li>Planea el mantenimiento de tus equipos oportunamente</li>
			<li>Inspecciona el proceso y el producto para el cumplimiento de la calidad</li>
			<li>Genera oportunamente los avisos de mantenimiento correctivo y mide la eficiencia de este proceso</li>
			<li>Calcula la efectividad de los equipos de producción</li>
			</ul>',
			'blog_h1'        => 'Blog',
			'blog_sub'       => 'Mantente informado con las noticias y tendencias en software y equipos que te ayudarán a gestionar mejor tu negocio',
			'created_at'     => date("Y-m-d H:i:s"),
			'updated_at'     => date("Y-m-d H:i:s")
        ]);
    }
}
