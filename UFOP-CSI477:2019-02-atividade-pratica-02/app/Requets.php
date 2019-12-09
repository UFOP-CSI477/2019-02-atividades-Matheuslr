<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requets extends Model
{

protected $fillable = ['description', 'date','user_id', 'subject_id'];

    public function subject() {
        return $this->belongsTo('App\Subject');
      }

    public function users() {
        return $this->belongsTo('App\User');
      }
}
