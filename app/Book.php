<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title"];
    // protected $guarded = []; // <- my personal favorite

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
