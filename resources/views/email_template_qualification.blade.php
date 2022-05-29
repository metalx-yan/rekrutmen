
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
     <h4>Perihal : Panggilan Inteview</h4>
 
     <span>Kepada Yth</span><p>
     Saudara {{ ucwords($name) }}<p>
     Di Tempat <p>
     Dengan Hormat,
     <div style="text-indent: 2em"> Sehubung dengan Surat Lamaran Pekerjaan yang Saudara kirim 
             untuk menjadi staf administrasi di perusahaan kami, maka dengan ini kami mengundang
             Saudara untuk menghadiri sesi interview/ wawancara pada:</div>
 <p>
     &nbsp;&nbsp;&nbsp; Tanggal : {{ $job_vacancy }} <p>
     &nbsp;&nbsp;&nbsp; Posisi  : {{ $posisi }} <p>
     &nbsp;&nbsp;&nbsp; Waktu   : 09.00 s/d Selesai<p>
     &nbsp;&nbsp;&nbsp; Tempat  : Kantor Pusat PT. Prospera Perwira Utama, Crown Green Lake City, Blk. H
     No.16, RT.004/RW.008, Petir, Kec. Cipondoh, Kota Tangerang, Banten
     15140 <p>
             Demikian pemberitahuan dari kami. Atas kehadiran Saudara, kami ucapkan terimakasih.
             Selamat bergabung di perusahaan kami!
             <p><br>
                     <div style="text-indent:55.5em">Tangerang</div><p>
                     <div style="text-indent:55em">Hormat Kami</div><p><br><br>
                     <div style="text-indent:56.8em">HRD</div>
     
 </body>
 </html>
 
 
 