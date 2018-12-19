<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sursoom extends Model
{
	protected $table = 'sursoom';

    protected $fillable = [
		'img_1',
		'img_2',
		'img_3',
		'img_4',
		'img_5',
		'img_6',
		'header_h1',
		'header_sub',
		'about_h1',
		'about_content',
		'break_h1',
		'products_h1',
		'products_sub',
		'docs_h1',
		'docs_content_1',
		'docs_h2',
		'docs_content_2',
		'blog_h1',
		'blog_sub'
    ];
}
