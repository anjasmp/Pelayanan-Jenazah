@extends('user.default')

@include('user.partials.header')
@include('user.pelayananjenazah.introdetail')
@section('content')


<section class="section-details-content" id="popularContent">
  <div class="container" style="margin-top: 30px; margin-bottom: 30px">
    <div class="row">
      <div class="col-lg-8 pl-lg-0">
        <div class="card card-details" style="margin: 10px">
          <h1>{{ $item->title }}</h1>
          <p>
            <span class="badge badge-pill badge-dark" style="background: #002b65">{{ $item->type }}</span>
          </p>
          {{-- @if ($item->galleries->count())
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
            </div> --}}
            <h2>Deskripsi</h2>
            <p>
              {!! $item->about !!}
            </p>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card card-details card-right" style="margin: 10px">
          <h2>Information</h2>
          <div class="col-md-6">
            <img
              src="{{ asset('user/assets/img/ic_bank.png')}}"
              alt=""
              class="features-image"
            />
            <div class="description">
              <h2><div class="myDIV">{{ $item->register }}</div></h2>
              <p>Pendaftaran</p>
            </div>
          </div>

          <div class="col-md-6">
            <img
              src="{{ asset('user/assets/img/ic_event.png')}}"
              alt=""
              class="features-image"
            />
            <div class="description">
            <h2><div class="myDIV">{{ $item->price }}  </div></h2>
              <p>/{{ $item->type }}</p> 
            </div>
          </div>

          <hr />

          @auth
          <h2>Penanggung Jawab</h2>
          <p>Nama : <span style="font-weight: bold; color: #039ea3">{{ Auth::user()->name }}</span> </p>
          {{-- <label class="sr-only" for="inputUsername">Nominal</label>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
                  <form action="{{ route('product.checkout-process', $item->id)}}" method="post" id="authForm">
                    @csrf
                    <input
                    name="nominal"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputNominal"
                    placeholder="Nominal Rp."
                  />
                  </form> --}}
          @endauth
         
             

              @guest
              <div class="member mt-3">
                <h2>Formulir Pendaftaran</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
              </div>
              @endguest
        </div>
        <div class="join-container" style="margin-left: 10px; margin-right: 10px">
          <button class="btn btn-block btn-join-now mt-3 py-2" type="submit" form="authForm">Daftar Sekarang!</button>
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

    $.post("/productcheckout/{id}", {
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