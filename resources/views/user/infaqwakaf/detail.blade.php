@extends('user.default')

@include('user.partials.header')
@include('user.infaqwakaf.introdetail')
@section('content')


<section class="section-details-content" id="popularContent">
  <div class="container" style="margin-top: 30px; margin-bottom: 30px">
    <div class="row">
      <div class="col-lg-8 pl-lg-0">
        <div class="card card-details">
          <h1>{{ $item->title }}</h1>
          <p>
            <span class="badge badge-pill badge-dark" style="background: #002b65">{{ $item->type }}</span>
          </p>
          @if ($item->galleries->count())
          <div class="gallery">
            <div class="xzoom-container">
              <img
                class="xzoom"
                id="xzoom-default"
                src="{{ Storage::url($item->galleries->first()->image)}}"
                xoriginal="{{ Storage::url($item->galleries->first()->image)}}"
              />
              <div class="xzoom-thumbs">
                @foreach ($item->galleries as $gallery)
                <a href="{{ Storage::url($gallery->image)}}"
                ><img
                  class="xzoom-gallery"
                  width="128"
                  src="{{ Storage::url($gallery->image)}}"
                  xpreview="{{ Storage::url($gallery->image)}}"
              /></a>
                @endforeach
              </div>
            </div>
            <h2>Tentang Donasi</h2>
            <p>
              {!! $item->about !!}
            </p>
            <hr />
            <div>
              <div id="disqus_thread"></div>
<script>


(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://masjidbaitulhaqpurigading.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

          </div>
          </div>
          @endif
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card card-details card-right">
          <h2>Information</h2>
          <table class="trip-informations">
            <tr>
              <th width="50%">Completion Date</th>
              <td width="50%" class="text-right">{{ \carbon\carbon::create($item->target_waktu)->format('d, M Y')}}</td>
            </tr>
            <tr>
              <th width="50%">Remaining Time</th>
              <td width="50%" class="text-right">{{ \carbon\Carbon::parse(\carbon\Carbon::now())->diffInDays($item->target_waktu) }} Hari</td>
            </tr>
            <tr>
              <th width="50%">Type</th>
              <td width="50%" class="text-right">{{ $item->type }}</td>
            </tr>
          </table>
          <div class="features row pt-3">
            @if ($item->target_dana == true)
          <h2>Donation Progress</h2>
            <div class="col-md-6">
              <img
                src="{{ asset('user/assets/img/ic_bank.png')}}"
                alt=""
                class="features-image"
              />
              <div class="description">
                <h3><div class="myDIV">0</div></h3>
                <p>Terkumpul</p>
              </div>
            </div>
            <div class="col-md-6 border-left">
              <img
                src="{{ asset('user/assets/img/ic_event.png')}}"
                alt=""
                class="features-image"
              />
              <div class="description">
                <h3><div class="myDIV">{{ $item->target_dana }}</div></h3>
                <p>Target Donasi</p> 
              </div>
            </div>
            @endif
          </div>

          <hr />

          @auth
          <h2>Nominal Donation</h2>
          <p>Donatur Name : <span style="font-weight: bold; color: #039ea3">{{ Auth::user()->name }}</span> </p>
          <label class="sr-only" for="inputUsername">Nominal</label>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
                  <form action="{{ route('donation.checkout-process', $item->id)}}" method="post" id="authForm">
                    @csrf
                    <input
                    name="nominal"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputNominal"
                    placeholder="Nominal Rp."
                  />
                  </form>
          @endauth
         
             

              @guest
              <div class="member mt-3">
                <h2>Form Donatur</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('donation.checkout-process', $item->id)}}" method="post" id="authForm">
                  @csrf
                  <label class="sr-only" for="inputUsername">Name</label>
                  <input
                  name="name"
                    type="text"
                    class="form-control mb-2 mr-sm-2"
                    id="inpuName"
                    placeholder="Nama"
                  />
                  <label class="sr-only" for="inputUsername">Email</label>
                  <input
                  name="email"
                    type="email"
                    class="form-control mb-2 mr-sm-2"
                    id="inputEmail"
                    placeholder="Email"
                  />
                  <label class="sr-only" for="inputUsername">No WhatsApp</label>
                  <input
                  name="no_handphone"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputWhatsapp"
                    placeholder="No WhatsApp"
                  />
                  
                  <label class="sr-only" for="inputUsername">Nominal</label>
                  <input
                  name="nominal"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputNominal"
                    placeholder="Nominal Rp."
                  />

                </form>
               <a href="{{ route('login')}}"> <h3 class="mt-2 mb-0"><span style="font-weight: bold;">Login atau Register Disini</span></h3></a>
                <p class="disclaimer mb-0">
                  Untuk donatur tetap silahkan register terlebih dahulu untuk memudahkan donasi selanjutnya
                </p>
              </div>
              @endguest
        </div>
        <div class="join-container">
          <button class="btn btn-block btn-join-now mt-3 py-2" type="submit" form="authForm">Donation Now</button>
        </div>
      </div>
    </div>
  </div>
</section>

@include('user.partials.footer')

@push('scripts')

<script src="https://code.jquery.com/jquery-3.4.1.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>

{{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey')}}">
</script> --}}


    <script src="{{ asset('user/assets/vendor/jquery/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/retina/retina.js')}}"></script>
    <script src="{{ asset ('user/assets/vendor/xzoom/dist/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>


<script>
  let x = document.querySelectorAll(".myDIV"); 
  for (let i = 0, len = x.length; i < len; i++) { 
      let num = Number(x[i].innerHTML) 
                .toLocaleString('en'); 
      x[i].innerHTML = num; 
      x[i].classList.add("currSign"); 
  } 
</script>

    {{-- midtrans
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('services.midtrans.clientKey')}}"></script>

<script>
  $("#authForm").submit(function (event) {
    event.preventDefault();

    $.post("/donationcheckout/{id}", {
      _method: 'POST',
      _token: '{{ csrf_token()}}',
      name: $('input#inpuName').val(),
      email: $('input#inputEmail').val(),
      no_handphone: $('input#inputWhatsapp').val(),
      transaction_total: $('input#inputNominal').val()

    },
    );
  });
</script> --}}




@endpush