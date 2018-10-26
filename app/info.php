<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','identity','ptclNO','mobileNo','address',
     ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ]; 
}
