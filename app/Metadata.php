<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
	protected $table = 'metadata';

    protected $fillable = [
        'ss_title', 'ss_description', 'ss_keywords', 'gba_title', 'gba_description', 'gba_keywords', 'odoo_title', 'odoo_description', 'odoo_keywords'
    ];
}
