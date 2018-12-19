<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odoo extends Model
{
	protected $table = 'odoo';
	
	protected $fillable = [
		'header_img',
		'header_h1',
		'about_h1',
		'about_content',
		'about_img',
		'clients_h1',
		'apps_h1',
		'break_h1',
		'break_img',
		'meth_h1'
    ];
}
