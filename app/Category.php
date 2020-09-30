<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Category extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'categories';

    protected $fillable = [
        'name'
    ];

    public function post()
    {
        return $this->hasMany('App\Posts','categoryId');
    }
}
