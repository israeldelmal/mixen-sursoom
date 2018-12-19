<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';

    protected $fillable = [
		'title',
		'slug',
		'content',
		'description',
		'keywords',
		'img',
		'status',
		'user_id'
    ];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
