<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'name',
    ];
    public  function detail(){
        return $this->hasMany('App\Detail');
    }
    public  function order(){
        return $this->hasMany('App\Order');
    }
}
