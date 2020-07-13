<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reporters()
    {
        return $this->belongsToMany(User::Class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
