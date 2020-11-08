<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory

//the users that belong ot the role

    public function users()
    {
      return $this->belongsToMany('App\Models\User');

    }
}
