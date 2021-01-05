<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    protected $guarded = ['id'];

    public function Port()
    {
       return $this->belongsTo('App\Port');
    }

    public function getDetailAttribute()
    {
        return $this->attributes['detail'].'('.$this->Port->detail.')';
    }

    public function detail_edit()
    {
      return $this->attributes['detail'];
    }
    
}
