<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GBABreak extends Model
{
	protected $table = 'gba_break';

    protected $fillable = ['name', 'status', 'user_id'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
