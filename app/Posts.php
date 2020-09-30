<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Posts extends Eloquent
{

    protected $connection = 'mongodb';
    protected $collection = 'posts';

    protected $fillable = [
        'title', 'body', 'categoryId', 'userId'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','_id','userId');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','_id','categoryId');
    }
}
