<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Mail;

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
    public function storeUser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nik' => 'required|numeric|digits:16',
            'name' => 'required|string',
            'address' => 'required|string',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|date',
            'telp' => 'required|string',
            'gender' => 'required',
            'status' => 'required',
            'resume' => 'required',
            'religion' => 'required|string',
            'email' => 'required|string|unique:applicants',
            'job_vacancy_id' => 'required',
        ]);

        if ($request->hasFile('resume')) {
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
                'resume' => $request->file('resume')->store('files'),
                'job_vacancy_id' => $request->job_vacancy_id
            ]);
                
        }
        
        return redirect('/');
        
    }

    public function sendEmail(Request $request)
    {
        // dd($request->all());
        $email = $request->email;
        $data = array(
                'name' => $request->name,
                'total' => $request->total
            );
        // Kirim Email
        Mail::send('email_template', $data, function($mail) use($email) {
            $mail->to($email, 'no-reply')
                    ->subject("Sample Email Laravel");
            $mail->from('farandibagas@gmail.com', 'Email');
        });
        // Cek kegagalan
        if (Mail::failures()) {
            return "Gagal mengirim Email";
        }
            return "Email berhasil dikirim!";
    }

    public function list()
    {
        $applicants = Applicant::all();

        return view('applicants.list', compact('applicants'));
    }

    public function listApp($id)
    {
        $app = Applicant::find($id);

        return view('applicants.show', compact('app'));
    }

    public function pass()
    {
        $applicants = Applicant::all();

        return view('applicants.pass', compact('applicants'));
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
