<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fillLevel_logs extends Model
{
    protected $table = 'fill_level_logs';

    public function fms() {
        return $this->belongsTo('App\fms');
    }

    
}
