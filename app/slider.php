<?php

namespace App;
use app\flat;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    public function flat()
    {
        return $this->belongsTo('App\flat');
    }
}
