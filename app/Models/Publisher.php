<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    //get the books for the publisher

    public function books()
    {
      return $this->hasMany('App\Models\Book');
    }
}
