<section id="infaqwakaf" class="section-infaqwakaf">
  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h3>Infaq & Wakaf</h3>
      <p>Rasulullah Shallallahu 'alaihi  wasallam bersabda : "Jika manusia meninggal dunia maka putuslah amalnya kecuali tiga hal; Shadaqah jariyah, ilmu yang diambil manfaat dan anak shalih yang mendoakannya." (HR. Muslim)</p>
    </header>

  </div>
</section><!-- End Services Section -->
<section class="section-popular-content" id="infaqwakaf">
  <div class="container" data-aos="fade-up">
    <div class="section-popular-travel row justify-content-center">
      @foreach ($items as $item)
      <div class="col-sm-6 col-md-4 col-lg-3">
        
        <div
        class="card-travel text-center d-flex flex-column"
      style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}');">
        <div class="travel-country " style="text-shadow: 1px 1px #444544;"><span class="badge badge-pill badge-dark" style="background: #002b65">{{ $item->type }}</span></div>
        <div class="travel-location" style="text-shadow: 1px 1px #444544;"">{{ $item->title }}</div>
        <div class="travel-button mt-auto">
        <a href="{{ route('donation.detail', $item->slug)}}" class="btn btn-travel-details px-4">
            View Details
          </a>
        </div>
      </div>
        
      </div>
      @endforeach
      
      
    </div>
    <footer class="section-footer" style="margin-top: 30px; margin-bottom: 50px; text-align: center">
      <a href="{{ route('donation.list')}}"><button class="btn btn-primary">View More!</button></a>
  </footer>
  </div>
</section>