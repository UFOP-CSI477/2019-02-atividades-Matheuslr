<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

protected $fillable = ['name', 'price'];

    public function subjects() {
        return $this->hasMany('App\Requets');
      }
}
