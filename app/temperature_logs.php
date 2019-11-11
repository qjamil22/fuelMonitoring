<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temperature_logs extends Model
{
    protected $table = 'temperature_logs';

    public function fms() {
        return $this->belongsTo('App\fms');
    }
}
