<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channel';

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
