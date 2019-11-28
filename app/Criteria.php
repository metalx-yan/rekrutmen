<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = ['name', 'job_vacancy_id'];

    public function job_vacancy()
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
