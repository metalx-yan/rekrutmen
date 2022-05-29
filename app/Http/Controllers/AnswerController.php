<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $arr = [];
        foreach ($request->all() as $key => $value) {
            if(strpos($key, 'answer_') !== false){
                Answer::create([
                    'user_id' => $request->user,
                    'result' => explode('_',$value)[0],
                    'psikotest_id' => explode('_',$value)[1]
                ]);
            } 
        }

        $sa = DB::select('SELECT count(*) as result, d.id  as app from answers a
        join psikotests b
        on a.psikotest_id = b.id
        join users c
        on a.user_id = c.id
        join applicants d
        on c.id = d.user_id
        where a.result = b.answer_correct
        group by d.id');
        DB::table('assessments')->insert([
            'written' => $sa[0]->result,
            'applicant_id' => $sa[0]->app,
        ]);

        return redirect()->back();
        // dd(json_decode($request->job)->pivot->psikotest_id, $request->user,$arr);
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
}
