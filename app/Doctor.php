<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function user(){
      return $this->belongsTo('App\User'); //inherits from user
    }

        public function visits(){
          return $this->hasMany('App\Visit'); //doctor has many visits
        }



}
