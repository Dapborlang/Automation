<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MrtRecharge extends Model
{
    protected $guarded = ['id'];

    public function MrtAgent()
    {
       return $this->belongsTo('App\MrtAgent');
    }

    public function MrtPlanValue()
    {
       return $this->belongsTo('App\MrtPlanValue');
    }

    public function MrtRcType()
    {
       return $this->belongsTo('App\MrtRcType');
    }

    public function MrtServiceProvider()
    {
       return $this->belongsTo('App\MrtServiceProvider');
    }
}
