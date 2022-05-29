<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use Carbon\Carbon;
class AssessmentController extends Controller
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
        // dd($request->id);
        // dd(($request->interview + $request->written)/2);
        // $request->validate([
        //     'interview' => 'required',
        //     'written' => 'required',
        //     'applicant_id' => 'required',
        // ]);
        
        $sum = ($request->interview + $request->written)/2;

        $update = Assessment::findOrFail($request->id);
        $update->interview = $request->interview;
        $update->total = $sum;
        $update->created_at = Carbon::now();
        $update->save();

        // Assessment::create([
        //     'interview' => $request->interview,
        //     'total' => $sum,
        //     'applicant_id' => $request->applicant_id,
        // ]);
        return redirect()->route('list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
