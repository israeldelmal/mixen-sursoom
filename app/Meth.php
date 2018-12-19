<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meth extends Model
{
    protected $table = 'meths';

    protected $fillable = [
		'title',
		'slug',
		'content',
		'img',
		'status',
		'user_id'
    ];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
