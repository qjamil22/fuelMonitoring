<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class power_logs extends Model
{
    protected $table = 'power_logs';

    public function fms() {
        return $this->belongsTo('App\fms');
    }
}
