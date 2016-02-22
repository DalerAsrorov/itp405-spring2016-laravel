<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'label_id', 'format_id', 'sound_id', 'genre', 'release_date', 'rating'];

    public function genre()
    {
      return $this->belongsTo('App\Models\Genre');
    }
    public function label()
    {
      return $this->belongsTo('App\Models\Label');
    }
    public function rating()
    {
      return $this->belongsTo('App\Models\Rating');
    }
}
