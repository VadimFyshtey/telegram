<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table = 'category_news';

    public function news(){
        return $this->hasMany('App\News');
    }
}
