<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voltage_logs extends Model
{
    protected $table = 'voltage_logs';

    public function fms() {
        return $this->belongsTo('App\fms');
    }
}
