<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    //
    protected $fillabe = ['name'];

    public function notes(){

       return $this->hasMany(Note::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}