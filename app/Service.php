<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $table = 'services';

    protected $fillable = [
		'title',
		'slug',
		'img',
		'content',
		'description',
		'status',
		'user_id'
    ];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
