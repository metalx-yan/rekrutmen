<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = ['interview', 'written', 'total', 'applicant_id'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
