<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoreSettings extends Model
{
    protected $table = 'core_settings';

    protected $fillable = [
        'key', 'value'
    ];
}
