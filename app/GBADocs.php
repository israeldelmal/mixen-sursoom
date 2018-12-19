<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GBADocs extends Model
{
	protected $table = 'gba_docs';

    protected $fillable = ['title', 'img', 'content', 'status', 'user_id'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
