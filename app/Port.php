<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $guarded = ['id'];

    public function IP()
    {
       return $this->belongsTo('App\IP','i_p_s_id');
    }

    public function getDetailAttribute()
    {
        return $this->attributes['detail'].'('.$this->IP->detail.')';
    }

    public function detail_edit()
    {
      return $this->attributes['detail'];
    }
}
