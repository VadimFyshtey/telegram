<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function channels(){
        return $this->hasMany('App\Channel');
    }

    public function trade(){
        return $this->hasMany('App\Trade');
    }
}
