<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uri extends Model
{
    protected $guarded = ['id'];

    public function listUri()
    {
       return $this->hasMany('App\UriList','uri_id');
    }

    public function User()
    {
       return $this->belongsTo('App\User','user_id');
    }
}
