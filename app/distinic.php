<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class distinic extends Model
{
protected $primaryKey ="dis_id";
public $timestamps = false;
 
public function flat()
{
    return $this->hasMany('App\flat');
}

}
