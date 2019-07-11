<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'status','qty',
    ];
    public  function detail(){
        return $this->hasMany('App\Detail');
    }

    public function item(){
        return $this->belongsTo('App\Item');

    }
    public  function user(){
        return $this->belongsTo('App\User');
    }
}
