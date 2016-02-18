<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  public function dvds()
  {
    return $this->belongsTo('App\Models\Dvd');
  }
}
