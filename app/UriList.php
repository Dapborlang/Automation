<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UriList extends Model
{
    protected $guarded = ['id'];
    
    public function Uri()
    {
       return $this->belongsTo('App\Uri','uri_id');
    }
}
