<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $fillable = ['start', 'end', 'name', 'slug' ,'status', 'interviewdate', 'interviewtime', 'room'];

    protected $dates = ['start', 'end', 'interviewdate'];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function criterias()
    {
        return $this->hasMany(Criteria::class);
    }

    public function applicants()
    {  
        return $this->hasMany(Applicant::class);
    }

    public function setInterviewtimeAttribute($value)
    {
        $this->attributes['interviewtime'] = date('h:i:s', strtotime($value));
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = date('Y-m-d', strtotime($value));
    }

    public function psikotests()
    {
    	return $this->belongsToMany(Psikotest::class,'psikotest_jobvacancy');
    }
}
