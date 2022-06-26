<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Assessment;
use App\JobVacancy;
use App\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\DB;

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
            $user = User::create([
                'name' => $request->name,
                'username' => strtolower(str_replace(' ', '', $request->name)),
                'password' => 'user',
                'role_id' => '3'
            ]);
            // dd($user->id);
            Applicant::create([
                'nik' => $request->nik,
                'name' => $user->name,
                'address' => $request->address,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
                'telp' => $request->telp,
                'gender' => $request->gender,
                'status' => $request->status,
                'religion' => $request->religion,
                'email' => $request->email,
                'resume' => $request->file('resume')->store('files'),
                'job_vacancy_id' => $request->job_vacancy_id,
                'user_id' => $user->id
            ]);
                
        }
        
        return redirect('/');
        
    }

    public function updateC(Request $request, $id)
    {
        $sum = ($request->interview + $request->written)/2;
        // dd($request->all(), $sum, $request->interview);
        
        $update = Assessment::where('applicant_id', $id)->first();
        // dd($update);
        $update->interview = $request->interview;
        $update->total = $sum;
        $update->created_at = Carbon::now();
        $update->save();

        return redirect()->route('list');
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
                    ->subject("Hasil Tes Interview");
            $mail->from('farandibagas@gmail.com', 'Email');
        });
        // Cek kegagalan
        if (Mail::failures()) {
            return "Gagal mengirim Email";
        }
            return redirect()->back();
    }

    public function sendEmailQualification(Request $request)
    {
        // dd($request->all());
        // dd(Carbon::parse($request->job_vacancy)->format('d F Y'));
        $user_name = User::find($request->username);
        // dd($request->all(), $user_name->username);
        $psiko = DB::select("SELECT distinct c.start, c.end from job_vacancies a join psikotest_jobvacancy b on a.id = b.job_vacancy_id join psikotests c on b.psikotest_id = c.id where a.id = $request->job");
        // dd($psiko[0]->start);
        $email = $request->email;
        $data = array(
                'name' => $request->name,
                'total' => $request->total,
                'job_vacancy' => Carbon::parse($request->job_vacancy)->format('d F Y'),
                'job_time' => Carbon::parse($request->job_time)->format('d F Y'),
                'posisi' => $request->posisi,
                'username' => $user_name->username,
                'start_psiko' => $psiko[0]->start,
                'end_psiko' => $psiko[0]->end,
            );
        // Kirim Email
        Mail::send('email_template_qualification', $data, function($mail) use($email) {
            $mail->to($email, 'no-reply')
                    ->subject("Panggilan Interview");
            $mail->from('farandibagas@gmail.com', 'Email');
        });
        // Cek kegagalan
        if (Mail::failures()) {
            return "Gagal mengirim Email";
        }
            return redirect()->back();
    }
    
    public function list()
    {
        $applicants = Applicant::all();
        // dd(isset($applicants[1]->assessment));
        return view('applicants.list', compact('applicants'));
    }

    public function listAll()
    {
        $applicants = Applicant::all();

        return view('applicants.all', compact('applicants'));
    }

    public function listApp($id)
    {
        $app = Applicant::find($id);
        // dd($app);
        $ass = Assessment::where('applicant_id', $id)->get();
        // $hsl = isset($hsl) ? $ass[0]->id : '';
        if (count($ass) == 0) {
            $hsl = 0;
        } else {
            $hsl = $ass[0]->written;
        }
        // $hsl = $ass[0]->id;
        $sq = DB::table('assessments')->select('written')->join('applicants','assessments.applicant_id','=','applicants.id')->where('applicants.id', $id)->get();
        if (count($sq) == 0) {
            $sq = 0;
        } else {
            $sq = $sq[0]->written;
        }
        // dd($app->id);
        return view('applicants.show', compact('app','sq','hsl'));
    }

    public function pass()
    {
        $applicants = Applicant::all();

        return view('applicants.pass', compact('applicants'));
    }

    public function accDir()
    {
        $applicants = Applicant::all();

        return view('applicants.accdir', compact('applicants'));
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
