<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
		'name',
		'img',
		'status',
		'user_id'
    ];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
