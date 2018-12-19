<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GBA extends Model
{
	protected $table = 'gba';

    protected $fillable = [
		'header_h1',
		'header_sub',
		'header_logo',
		'header_img',
		'about_h1',
		'about_content',
		'about_img',
		'break_h1',
		'break_img',
		'solutions_h1',
		'solutions_sub',
		'sistems_h1',
		'sistems_img'
    ];
}
