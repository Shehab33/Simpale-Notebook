<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //

    protected $fillabe = ['title','body'];
    public function notebook(){

        return $this->belongesTo(Notebook::class);
    }
}
