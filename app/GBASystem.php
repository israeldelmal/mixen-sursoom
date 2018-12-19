<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GBASystem extends Model
{
	protected $table = 'gba_systems';
	
	protected $fillable = ['title', 'img', 'status', 'user_id'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
