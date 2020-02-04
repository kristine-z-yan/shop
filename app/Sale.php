<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'product_id', 'qnt'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
