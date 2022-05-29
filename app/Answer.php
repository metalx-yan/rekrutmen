<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id','result','psikotest_id'];

    public function psikotest()
    {
        return $this->belongsTo(Psikotest::class);
    }
}
