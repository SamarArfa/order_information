<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public  function detail(){
        return $this->hasMany('App\Detail');
    }
    public  function order(){
        return $this->hasMany('App\Order');
    }
}
