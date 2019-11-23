<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobVacancy;
use App\Requirement;
use App\Criteria;
use Carbon\Carbon;


class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JobVacancy::all();
        return view('jobvacancies.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
            'name' => 'required|string',
        ]);

        $jobvacancy = new JobVacancy;
        $jobvacancy->start = Carbon::parse($request->start)->format('Y-m-d');
        $jobvacancy->end = Carbon::parse($request->end)->format('Y-m-d');
        $jobvacancy->name = $request->name;
        $jobvacancy->save();

        foreach ($request->requirements as $requirement) {
            Requirement::create([
                'name' => $requirement,
                'job_vacancy_id' => $jobvacancy->id
            ]);
        }

        foreach ($request->criterias as $criteria) {
            Criteria::create([
                'name' => $criteria,
                'job_vacancy_id' => $jobvacancy->id
            ]);
        }
        
        return redirect()->back();
    }

    public function schedule()
    {
        $jobs = JobVacancy::all();

        return view('jobvacancies.schedule', compact('jobs'));
    }

    public function scheduleStore(Request $request, $id)
    {
        $request->validate([
            'interviewdate' => 'required|date',
            'interviewtime' => 'date_format:h:i',
            'room' => 'required|string',
        ]);
        
            $update = JobVacancy::findOrFail($id);
            $update->interviewdate = $request->interviewdate;
            $update->interviewtime = $request->interviewtime;
            $update->room = $request->room;
            $update->save();
            
           
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $job = JobVacancy::find($id);

        // return view('jobvacancies.show', compact('job'));
    }

    public function vacancy($id)
    {
        $job = JobVacancy::find($id);

        return view('jobvacancies.show', compact('job'));
    }


    public function scheduleEdit(Request $request, $id)
    {
        $request->validate([
            'interviewdate' => 'required|date',
            // 'interviewtime' => 'date_format:h:i',
            'room' => 'required|string',
        ]);
        
            $update = JobVacancy::findOrFail($id);
            $update->interviewdate = $request->interviewdate;
            $update->interviewtime = $request->interviewtime;
            $update->room = $request->room;
            $update->save();
            
           
        return redirect()->route('schedule.job');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = JobVacancy::find($id);

        return view('jobvacancies.scheduleedit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
