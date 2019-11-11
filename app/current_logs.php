<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class current_logs extends Model
{
    protected $table = 'current_logs';

    public function fms() {
        return $this->belongsTo('App\fms');
    }
}
