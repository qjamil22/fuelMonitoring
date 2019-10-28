<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status_logs extends Model
{
    protected $table = 'status_logs';

    public function fms() {
        return $this->belongsTo('App\fms');
    }
}
