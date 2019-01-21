<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['phone', 'addressline', 'place', 'postnr'];


}
