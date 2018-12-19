<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table = 'apps';

    protected $fillable = [
		'title',
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
