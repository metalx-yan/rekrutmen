<!DOCTYPE html>
<html lang="en">
    @include('templates._head')
    
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    @include('templates._navbar')
    
    <div class="site-section" id="beranda">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5">
            <h1 class="text-white serif text-uppercase mb-4">Meet Your Next Book</h1>
            <p class="text-white mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis sint alias, doloribus assumenda totam porro ex impedit, recusandae voluptatibus sed.</p>
            <p><a href="#" class="btn btn-white px-4 py-3">Buy This Book On Amazon</a></p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-10">
          <img src="{{ asset('images/book_1.png') }}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" id="lowongan-kerja">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7">
            <h2 class="heading">Lowongan Kerja</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, harum repudiandae provident neque voluptas odio nostrum officiis debitis et vitae, dolorem placeat fugiat recusandae aperiam aspernatur expedita alias, officia. Suscipit!</p>
        </div>
        </div>
        <div class="row">
          @foreach (App\JobVacancy::all() as $jobvacancy)
            @if ($jobvacancy->end->format('Y-m-d') == Carbon\Carbon::now()->format('Y-m-d'))
            @elseif($jobvacancy->end->format('Y-m-d') != Carbon\Carbon::now()->format('Y-m-d'))
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="service h-100">
                    <span class="badge badge-success" style="margin-left: 80%;">{{ $jobvacancy->status == 1 ? 'Opened' : 'Closed' }}</span>
                      <p><span class=""><img src="http://www.prospera-perwira.com/img/logo_prospera.png" height="20%" width="50%" alt=""></span></p>
                    <h3>{{ ucwords($jobvacancy->name) }}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic tenetur ea in accusantium est.</p>
                    <a href="{{ route('vacancy', $jobvacancy->slug)  }}" class="btn btn-warning btn-sm">Details</a>
                  </div>
                </div>

            @endif

        @endforeach
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7">
            <h2 class="heading">Book Screenshot</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, harum repudiandae provident neque voluptas odio nostrum officiis debitis et vitae, dolorem placeat fugiat recusandae aperiam aspernatur expedita alias, officia. Suscipit!</p>
            <p class="mb-3">
              <a href="#" class="customNextBtn">Prev</a>
              <span class="mx-2">/</span>
              <a href="#" class="customPrevBtn">Next</a>
            </p>
          </div>
        </div>
        
        <div class="owl-carousel slide-one-item">
        <img src="{{ asset('images/img_1.jpg') }}" alt="Image" class="img-fluid">
        <img src="{{ asset('images/img_2.jpg') }}" alt="Image" class="img-fluid">
        <img src="{{ asset('images/img_3.jpg') }}" alt="Image" class="img-fluid">
        <img src="{{ asset('images/img_4.jpg') }}" alt="Image" class="img-fluid">
        <img src="{{ asset('images/img_5.jpg') }}" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="author  d-lg-flex" id="about-section">
      <div class="bg-img" style="background-image: url('http://www.prospera-perwira.com/img/about-img.jpg');"></div>
      <div class="text">
        <h3>Profil Prospera</h3>
        <p>PT. Prospera Perwira Utama adalah perusahaan yang memberikan solusi di bidang Network Infrastructure melingkupi (Konvensional Server, Hyperconverge Server Storage, Storage, Firewall, Network Security, Netwowrk Monitoring, Switch, Computer) dan juga kami meberikan solusi di bidang piranti lunak (Sistem Aplikasi).</p>
        <p>Kami telah berpengalaman lebih dari 5 tahun dalam mendistribusikan produk - produk kami yang berkualitas dan terjamin.</p>
        <p>Kami juga telah berpengalaman dalam bekerja sama dengan HP, DELL, LENOVO, ASUS, Nutanix, CITRIX, PALO ALTO, JUPITER, BLUE CODE, Mellanox, ARRISTA, dll.</p>
        <p>Kami berkomitmen untuk membantu bisnis sepenuhnya mewujudkan janji teknologi dan membantu memaksimalkan nilai teknologi yang dibutuhkan.</p>


        <div class="mt-5">
          <span class="d-block text-black mb-4"><span class="text-muted"></span></span>
        <img src=""class="img-fluid w-25">
        </div>
        
      </div>
    </div>



    <div class="site-section bg-light" id="testimonial-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2 class="heading">Testimonial From Readers</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="testimonial bg-white h-100">
              <blockquote class="mb-3">
                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
              </blockquote>
              <div class="d-flex align-items-center vcard">
                <figure class="mb-0 mr-3">
                <img src="{{ asset('images/person_3.jpg') }}" alt="Free website template by Free-Template.co" class="img-fluid ounded-circle">
                </figure>
                <div class="vcard-text">
                  <span class="d-block">Jacob Spencer</span>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="testimonial bg-white h-100">
              <blockquote class="mb-3">
                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
              </blockquote>
              <div class="d-flex align-items-center vcard">
                <figure class="mb-0 mr-3">
                <img src="{{ asset('images/person_1.jpg') }}" alt="Free website template by Free-Template.co" class="img-fluid ounded-circle">
                </figure>
                <div class="vcard-text">
                  <span class="d-block">David Shaun</span>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="testimonial bg-white h-100">
              <blockquote class="mb-3">
                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
              </blockquote>
              <div class="d-flex align-items-center vcard">
                <figure class="mb-0 mr-3">
                <img src="{{ asset('images/person_2.jpg') }}" alt="Free website template by Free-Template.co" class="img-fluid ounded-circle">
                </figure>
                <div class="vcard-text">
                  <span class="d-block">Craig Smith</span>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section py-5 bg-primary">
      <div class="container">
        <h3 class="text-white h4 mb-3 ml-3">Subscribe For The New Updates</h3>
        <div class="d-flex">
          <input type="text" class="form-control mr-4 px-4" placeholder="Enter your email address...">
          <input type="submit" class="btn btn-white px-4" value="Send Email">
        </div>
      </div>
    </div>
    
    @include('templates._footer')
    @include('templates._javascript')
  

  </div>
     
  </body>
</html>