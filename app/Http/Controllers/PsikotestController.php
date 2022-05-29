<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobVacancy;
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
        $data = DB::table('psikotests')->select('psikotests.start','psikotests.end','psikotest_jobvacancy.job_vacancy_id','job_vacancies.name')->join('psikotest_jobvacancy', 'psikotests.id', '=', 'psikotest_jobvacancy.psikotest_id')->join('job_vacancies', 'psikotest_jobvacancy.job_vacancy_id', '=', 'job_vacancies.id')->distinct()->get();
        $vacancy = [];
        foreach ($data as $job_vacancy) {
            $vacancy[] = $job_vacancy->job_vacancy_id;
        }
        // dd(in_array(1,$vacancy));
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
        $soal = Psikotest::all();
        // dd($soal);
        // $sa = DB::select('SELECT count(*) as result from answers a
        // join psikotests b
        // on a.psikotest_id = b.id
        // join users c
        // on a.user_id = c.id
        // where a.result = b.answer_correct');
        // dd($sa[0]->result);

        return view('psikotests.soal', compact('soal'));
    }
}
