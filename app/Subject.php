<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
