<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientheaderimg extends Model
{
  protected $fillable = [
    'user_id','image'
  ];

  public function client() {
  return $this->belongsTo(User::class);
  }

}
