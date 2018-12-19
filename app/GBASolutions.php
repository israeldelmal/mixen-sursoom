<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GBASolutions extends Model
{
	protected $table = 'gba_solutions';

    protected $fillable = ['title', 'slug', 'img', 'content', 'description', 'status', 'user_id'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
