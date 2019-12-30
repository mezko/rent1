<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public function flat()
    {
        return $this->hasMany('App\flat');
    }

}
