
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
 <body>
    <h4>Tangerang, {{ Carbon\Carbon::now()->format('d F Y') }}</h4>
     <h4>Perihal : Panggilan Inteview dan Jadwal Psikotest</h4>
 
     <span>Kepada Yth</span><p>
     Saudara {{ ucwords($name) }}<p>
     Di Tempat <p>
     Dengan Hormat,
     <div style="text-indent: 2em"> Sehubung dengan Surat Lamaran Pekerjaan yang Saudara kirim 
             di perusahaan kami, maka dengan ini kami mengundang
             Saudara untuk menghadiri sesi interview/ wawancara dan jadwal psikotest pada informasi berikut:</div>
 <p>
     &nbsp;&nbsp;&nbsp; Tanggal         : {{ $job_vacancy }} <p>
     &nbsp;&nbsp;&nbsp; Posisi          : {{ $posisi }} <p>
     &nbsp;&nbsp;&nbsp; Waktu           : {{ $job_time }} / Selesai <p>
     &nbsp;&nbsp;&nbsp; Username        : {{ $username }} <p>
     &nbsp;&nbsp;&nbsp; Password        : user <p>
     &nbsp;&nbsp;&nbsp; Waktu Psikotest : {{ $start_psiko }} - {{ $end_psiko }} <p>
     &nbsp;&nbsp;&nbsp; Website         : http://localhost:8000/login <p>
     &nbsp;&nbsp;&nbsp; Tempat  : Kantor Pusat PT. Anugrah Distributor Indonesia, Jalan Prabu Kian Santang
     Kec. Periuk, Kota Tangerang, Banten
     15140 <p>
             Demikian pemberitahuan dari kami. Atas kehadiran Saudara, kami ucapkan terimakasih.
             Selamat bergabung di perusahaan kami!
             <p><br>
                     <div style="text-indent:55.5em">Tangerang</div><p>
                     <div style="text-indent:55em">Hormat Kami</div><p><br><br>
                     <div style="text-indent:56.8em">HRD</div>
     
 </body>
 </html>
 
 
 