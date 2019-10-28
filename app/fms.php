<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fms extends Model
{
    protected $table = 'fms';

    public function fillLevel_logs() {
        return $this->hasMany('App\fillLevel_logs');
    }

    public function status_logs() {
        return $this->hasMany('App\status_logs');
    }
    
}
