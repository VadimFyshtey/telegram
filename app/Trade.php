<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{

    protected $table = 'trade';

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
