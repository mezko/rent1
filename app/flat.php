<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\slider;
class flat extends Model
{

    protected $primaryKey ="f_id";
    public function slider()
    {
        return $this->hasMany('App\slider');
    }

    public function distinic()
    {
        return $this->belongsTo('App\distinic');
    }
}
