<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'nik', 'name', 'address', 'place_of_birth', 'date_of_birth', 'telp', 'gender', 'status', 'religion', 'email', 'resume', 'job_vacancy_id'
    ];

    protected $dates = ['date_of_birth'];

    protected $dateFormat = 'Y-m-d';

    public function job_vacancy()
    {  
        return $this->belongsTo(JobVacancy::class);
    }
    
    public function assessment()
    {
        return $this->hasOne(Assessment::class);
    }
}
