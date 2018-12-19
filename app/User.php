<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relaciones
    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function services() {
        return $this->hasMany('App\Service');
    }

    public function gba_break() {
        return $this->hasMany('App\GBABreak');
    }

    public function gba_solutions() {
        return $this->hasMany('App\GBASolutions');
    }

    public function gba_docs() {
        return $this->hasMany('App\GBADocs');
    }

    public function gba_systems() {
        return $this->hasMany('App\GBASystem');
    }

    public function ecosystems() {
        return $this->hasMany('App\Ecosystem');
    }

    public function clients() {
        return $this->hasMany('App\Client');
    }

    public function apps() {
        return $this->hasMany('App\App');
    }

    public function meths() {
        return $this->hasMany('App\Meth');
    }
}
