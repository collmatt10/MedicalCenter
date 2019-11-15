<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  public function Doctor(){
    return $this->belongsTo('App\Doctor'); //visit has one doctor
  }

  public function Patient(){
    return $this->belongsTo('App\Patient'); //visit has one patient
  }
}
