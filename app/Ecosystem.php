<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecosystem extends Model
{
    protected $table = 'ecosystems';
	
	protected $fillable = ['title', 'content', 'status', 'user_id'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
