<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use App\JobVacancy;
use App\Answer;
use App\Psikotest;
use Illuminate\Support\Facades\DB;
class PsikotestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = JobVacancy::all();
        $soal = Psikotest::all();
        // dd($soal);
        $data = DB::table('psikotests')->select('psikotests.start','psikotests.end','psikotest_jobvacancy.job_vacancy_id','job_vacancies.name')->join('psikotest_jobvacancy', 'psikotests.id', '=', 'psikotest_jobvacancy.psikotest_id')->join('job_vacancies', 'psikotest_jobvacancy.job_vacancy_id', '=', 'job_vacancies.id')->distinct()->get();
        $vacancy = [];
        foreach ($data as $job_vacancy) {
            $vacancy[] = $job_vacancy->job_vacancy_id;
        }
        // dd($job);
        return view('psikotests.index', compact('job','data','vacancy'));
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
       
        foreach ($request->pertanyaan as $key => $val) {
                $create = new Psikotest();
                $create->start = $request->start;
                $create->end = $request->end;
                $create->question = $request->pertanyaan[$key];
                $create->answer_a = $request->a[$key];
                $create->answer_b = $request->b[$key];
                $create->answer_c = $request->c[$key];
                $create->answer_d = $request->d[$key];
                $create->answer_correct = $request->jawaban[$key];
                $create->save();
                DB::table('psikotest_jobvacancy')->insert([
                    'job_vacancy_id' => $request->lowongan,
                    'psikotest_id' => $create->id,
                ]);
                // $create->jobvacancies()->sync($create->id);
        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function soal()
    {
        $app = Applicant::all();
        $answer = Answer::all();

        $soal = DB::select('SELECT distinct a.*,b.job_vacancy_id,d.id as user_id from psikotests a
        join psikotest_jobvacancy b
        on a.id = b.psikotest_id
        join applicants c
        on b.job_vacancy_id = c.job_vacancy_id
        join users d
        on c.user_id = d.id');

        $as = [];
        foreach ($app as $value) {
            $as[] = $value->job_vacancy_id;
        }

        $answers = [];
        foreach ($answer as $ans) {
            $answers[] = $ans->user_id;
        }
        // dd($answers);

        return view('psikotests.soal', compact('soal','as','answers'));
    }
}
