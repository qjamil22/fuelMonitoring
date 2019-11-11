<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genStatus_logs extends Model
{
    protected $table = 'gen_status_logs';

    public function fms() {
        return $this->belongsTo('App\fms');
    }
}
