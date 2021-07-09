<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MrtPlanValue extends Model
{
    protected $guarded = ['id'];

    function getPlanValueAttribute()
    {
      return $this->attributes['plan_value'] . ' (' . $this->attributes['rechage_value'].')';
    }

    public function plan_value_edit()
    {
      return $this->attributes['plan_value'];
    }
}
