<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    //get publisher that published this book.

    public function publisher()
    {
      return $this->belongsTo('App\Models\Publisher');
    }

    public function reviews()
    {
      //user has many reviews
      return $this->hasMany('App\Models\Review');
    }
}
