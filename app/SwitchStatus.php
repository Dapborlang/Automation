<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SwitchStatus extends Model
{
    protected $guarded = ['id'];

    public function Pin()
    {
       return $this->belongsTo('App\Pin');
    }
}