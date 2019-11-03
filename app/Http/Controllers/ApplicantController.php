<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::all();

        return view('applicants.index', compact('applicants'));
    }

    public function download($id)
    {
        $download = Applicant::find($id);

        return response()->download($download->resume);
        // return Storage::download($download->resume,  $download->name);
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
            'nik' => 'required|numeric|digits:16',
            'name' => 'required|string',
            'address' => 'required|string',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|date',
            'telp' => 'required|string',
            'gender' => 'required',
            'status' => 'required',
            'religion' => 'required|string',
            'email' => 'required|string|unique:applicants',
            'job_vacancy_id' => 'required',
        ]);

        if ($request->hasFile('resume')) {

            // dd($size);
            $size = $request->file('resume')->getSize();

            $uniqueFileName = uniqid() . $request->file('resume')->getClientOriginalName() . '.' . $request->file('resume')->getClientOriginalExtension() ;

            $file  = $request->file('resume')->move(public_path() . '\files' , $uniqueFileName);

            Applicant::create([
                'nik' => $request->nik,
                'name' => $request->name,
                'address' => $request->address,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
                'telp' => $request->telp,
                'gender' => $request->gender,
                'status' => $request->status,
                'religion' => $request->religion,
                'email' => $request->email,
                'resume' => $file ,
                'job_vacancy_id' => $request->job_vacancy_id
            ]);
                
        }
        
        return redirect()->url('/');
        
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
