<?php
// Web
Route::get('/', 'WebController@sursoom')->name('sursoom');
Route::get('/gba', 'WebController@gba')->name('gba');
Route::get('/odoo', 'WebController@odoo')->name('odoo');
// Autenticación
Route::prefix('autenticacion')->group(function() {
	Route::get('/', 'AuthController@index')->name('autenticacion');
	Route::post('/autenticar', 'AuthController@auth');
	Route::get('/crear-cuenta', 'AuthController@create')->name('autenticacion/crear-cuenta');
	Route::post('/crear-cuenta/crear', 'AuthController@store');
	Route::get('/recuperar-contrasena', 'AuthController@index')->name('autenticacion/recuperar-contrasena');
	Route::post('/recuperar-contrasena/recuperar', 'AuthController@index');
	Route::get('/cerrar-sesion', 'AuthController@logout');
});
// Escritorio
Route::prefix('escritorio')->middleware(['user.status', 'verified'])->group(function() {
	// Index
	Route::get('/', 'DashboardController@index')->name('escritorio');
	// Usuarios
	Route::prefix('usuarios')->group(function() {
		Route::get('/', 'DashboardController@users')->name('escritorio/usuarios');
		Route::get('/editar/{id}', 'DashboardController@users_edit')->name('escritorio/editar');
		Route::get('/actualizar/{id}', 'DashboardController@users_update');
	});
	// Usuario
	Route::get('/usuario/{id}', 'DashboardController@user');
	Route::post('/usuario/actualizar/{id}', 'DashboardController@user_update');
	// Home
	Route::get('/cabecera', 'DashboardController@header')->name('escritorio/cabecera');
	Route::post('/cabecera/actualizar', 'DashboardController@header_update');
	Route::get('/nosotros', 'DashboardController@about')->name('escritorio/nosotros');
	Route::post('/nosotros/actualizar', 'DashboardController@about_update');
	Route::get('/descanso', 'DashboardController@break')->name('escritorio/descanso');
	Route::post('/descanso/actualizar', 'DashboardController@break_update');
	Route::get('/faq', 'DashboardController@faq')->name('escritorio/faq');
	Route::post('/faq/actualizar', 'DashboardController@faq_update');
	// Metadata
	Route::prefix('metadatos')->group(function() {
		Route::get('/sursoom', 'DashboardController@metadata_sursoom')->name('escritorio/metadatos/sursoom');
		Route::post('/sursoom/actualizar', 'DashboardController@metadata_sursoom_update');
		Route::get('/gba', 'DashboardController@metadata_gba')->name('escritorio/metadatos/gba');
		Route::post('/gba/actualizar', 'DashboardController@metadata_gba_update');
		Route::get('/odoo', 'DashboardController@metadata_odoo')->name('escritorio/metadatos/odoo');
		Route::post('/odoo/actualizar', 'DashboardController@metadata_odoo_update');
	});
	// Sursoom
	Route::prefix('sursoom')->group(function() {
		Route::get('/cabecera', 'DashboardController@sursoom_header')->name('escritorio/sursoom/cabecera');
		Route::post('/cabecera/actualizar', 'DashboardController@sursoom_header_update');
		Route::get('/nosotros', 'DashboardController@sursoom_about')->name('escritorio/sursoom/nosotros');
		Route::post('/nosotros/actualizar', 'DashboardController@sursoom_about_update');
		Route::get('/descanso', 'DashboardController@sursoom_break')->name('escritorio/sursoom/descanso');
		Route::post('/descanso/actualizar', 'DashboardController@sursoom_break_update');
		Route::get('/productos', 'DashboardController@sursoom_products')->name('escritorio/sursoom/productos');
		Route::post('/productos/actualizar', 'DashboardController@sursoom_products_update');
		Route::get('/documentacion', 'DashboardController@sursoom_docs')->name('escritorio/sursoom/documentacion');
		Route::post('/documentacion/actualizar', 'DashboardController@sursoom_docs_update');
		Route::get('/blog', 'DashboardController@sursoom_blog')->name('escritorio/sursoom/blog');
		Route::post('/blog/actualizar', 'DashboardController@sursoom_blog_update');
	});
	// Servicios
	Route::prefix('servicios')->group(function() {
		Route::get('/', 'DashboardController@services')->name('escritorio/servicios');
		Route::get('/crear', 'DashboardController@services_create')->name('escritorio/servicios/crear');
		Route::post('/almacenar', 'DashboardController@services_store');
		Route::get('/editar/{id}', 'DashboardController@services_edit')->name('escritorio/servicios/editar');
		Route::post('/actualizar/{id}', 'DashboardController@services_update');
	});
	// Artículos
	Route::prefix('articulos')->group(function() {
		Route::get('/', 'DashboardController@articles')->name('escritorio/articulos');
		Route::get('/crear', 'DashboardController@articles_create')->name('escritorio/articulos/crear');
		Route::post('/almacenar', 'DashboardController@articles_store');
		Route::get('/editar/{id}', 'DashboardController@articles_edit')->name('escritorio/articulos/editar');
		Route::post('/actualizar/{id}', 'DashboardController@articles_update');
	});
	// GBA
	Route::prefix('gba')->group(function() {
		Route::get('/cabecera', 'GBAController@header')->name('escritorio/gba/cabecera');
		Route::post('/cabecera/actualizar', 'GBAController@header_update');
		Route::get('/nosotros', 'GBAController@about')->name('escritorio/gba/nosotros');
		Route::post('/nosotros/actualizar', 'GBAController@about_update');
		Route::get('/descanso', 'GBAController@break')->name('escritorio/gba/descanso');
		Route::post('/descanso/actualizar', 'GBAController@break_update');
		Route::get('/soluciones', 'GBAController@solutions')->name('escritorio/gba/soluciones');
		Route::post('/soluciones/actualizar', 'GBAController@solutions_update');
		Route::get('/sistemas', 'GBAController@system')->name('escritorio/gba/sistemas');
		Route::post('/sistemas/actualizar', 'GBAController@system_update');
		// Elementos
		Route::prefix('elementos')->group(function() {
			Route::get('/', 'GBAController@gba_break')->name('escritorio/gba/elementos');
			Route::get('/crear', 'GBAController@gba_break_create')->name('escritorio/gba/elementos/crear');
			Route::post('/almacenar', 'GBAController@gba_break_store');
			Route::get('/editar/{id}', 'GBAController@gba_break_edit')->name('escritorio/gba/elementos/editar');
			Route::post('/actualizar/{id}', 'GBAController@gba_break_update');
		});
		// Soluciones
		Route::prefix('solutions')->group(function() {
			Route::get('/', 'GBAController@gba_solutions')->name('escritorio/gba/solutions');
			Route::get('/crear', 'GBAController@gba_solutions_create')->name('escritorio/gba/solutions/crear');
			Route::post('/almacenar', 'GBAController@gba_solutions_store');
			Route::get('/editar/{id}', 'GBAController@gba_solutions_edit')->name('escritorio/gba/solutions/editar');
			Route::post('/actualizar/{id}', 'GBAController@gba_solutions_update');
		});
		// Documentación
		Route::prefix('documentacion')->group(function() {
			Route::get('/', 'GBAController@gba_docs')->name('escritorio/gba/documentacion');
			Route::get('/crear', 'GBAController@gba_docs_create')->name('escritorio/gba/documentacion/crear');
			Route::post('/almacenar', 'GBAController@gba_docs_store');
			Route::get('/editar/{id}', 'GBAController@gba_docs_edit')->name('escritorio/gba/documentacion/editar');
			Route::post('/actualizar/{id}', 'GBAController@gba_docs_update');
		});
		// Sistemas
		Route::prefix('systems')->group(function() {
			Route::get('/', 'GBAController@gba_systems')->name('escritorio/gba/systems');
			Route::get('/crear', 'GBAController@gba_systems_create')->name('escritorio/gba/systems/crear');
			Route::post('/almacenar', 'GBAController@gba_systems_store');
			Route::get('/editar/{id}', 'GBAController@gba_systems_edit')->name('escritorio/gba/systems/editar');
			Route::post('/actualizar/{id}', 'GBAController@gba_systems_update');
		});
	});
	// Odoo
	Route::prefix('odoo')->group(function() {
		// Inicio
		Route::prefix('inicio')->group(function() {
			Route::get('/cabecera', 'OdooController@header')->name('escritorio/odoo/inicio/cabecera');
			Route::post('/cabecera/actualizar', 'OdooController@header_update');
			Route::get('/nosotros', 'OdooController@about')->name('escritorio/odoo/inicio/nosotros');
			Route::post('/nosotros/actualizar', 'OdooController@about_update');
			Route::get('/clientes', 'OdooController@clients')->name('escritorio/odoo/inicio/clientes');
			Route::post('/clientes/actualizar', 'OdooController@clients_update');
			Route::get('/aplicaciones', 'OdooController@apps')->name('escritorio/odoo/inicio/aplicaciones');
			Route::post('/aplicaciones/actualizar', 'OdooController@apps_update');
			Route::get('/descanso', 'OdooController@break')->name('escritorio/odoo/inicio/descanso');
			Route::post('/descanso/actualizar', 'OdooController@break_update');
			Route::get('/metodologia', 'OdooController@meth')->name('escritorio/odoo/inicio/metodologia');
			Route::post('/metodologia/actualizar', 'OdooController@meth_update');
		});
		// Ecosistema
		Route::prefix('ecosistemas')->group(function() {
			Route::get('/', 'OdooController@odoo_eco')->name('escritorio/odoo/ecosistemas');
			Route::get('/crear', 'OdooController@odoo_eco_create')->name('escritorio/odoo/ecosistemas/crear');
			Route::post('/almacenar', 'OdooController@odoo_eco_store');
			Route::get('/editar/{id}', 'OdooController@odoo_eco_edit')->name('escritorio/odoo/ecosistemas/editar');
			Route::post('/actualizar/{id}', 'OdooController@odoo_eco_update');
		});
		// Clientes
		Route::prefix('clientes')->group(function() {
			Route::get('/', 'OdooController@odoo_clients')->name('escritorio/odoo/clientes');
			Route::get('/crear', 'OdooController@odoo_clients_create')->name('escritorio/odoo/clientes/crear');
			Route::post('/almacenar', 'OdooController@odoo_clients_store');
			Route::get('/editar/{id}', 'OdooController@odoo_clients_edit')->name('escritorio/odoo/clientes/editar');
			Route::post('/actualizar/{id}', 'OdooController@odoo_clients_update');
		});
		// Aplicaciones
		Route::prefix('aplicaciones')->group(function() {
			Route::get('/', 'OdooController@odoo_apps')->name('escritorio/odoo/aplicaciones');
			Route::get('/crear', 'OdooController@odoo_apps_create')->name('escritorio/odoo/aplicaciones/crear');
			Route::post('/almacenar', 'OdooController@odoo_apps_store');
			Route::get('/editar/{id}', 'OdooController@odoo_apps_edit')->name('escritorio/odoo/aplicaciones/editar');
			Route::post('/actualizar/{id}', 'OdooController@odoo_apps_update');
		});
		// Metodología
		Route::prefix('metodologia')->group(function() {
			Route::get('/', 'OdooController@odoo_meth')->name('escritorio/odoo/metodologia');
			Route::get('/crear', 'OdooController@odoo_meth_create')->name('escritorio/odoo/metodologia/crear');
			Route::post('/almacenar', 'OdooController@odoo_meth_store');
			Route::get('/editar/{id}', 'OdooController@odoo_meth_edit')->name('escritorio/odoo/metodologia/editar');
			Route::post('/actualizar/{id}', 'OdooController@odoo_meth_update');
		});
	});
});