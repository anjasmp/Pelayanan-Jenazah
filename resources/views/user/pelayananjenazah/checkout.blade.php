@extends('user.default')

@include('user.partials.header')
@include('user.pelayananjenazah.introdetail')
@section('content')

<main>

  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0 pl-3 pl-lg-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                Paket Travel
              </li>
              <li class="breadcrumb-item" aria-current="page">
                Details
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Checkout
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details mb-3">
            <h1>Siap untuk bergabung?</h1>
            <p>
              Paket {{ $item->product->title }}
            </p>
            
              <div class="member mt-3">
                <h2>Data Penanggung Jawab</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <p>Nama : <span style="font-weight: bold; color: #039ea3">{{ Auth::user()->name }}</span> </p>
                <p>Email : <span style="font-weight: bold; color: #039ea3">{{ Auth::user()->email }}</span> </p>

                <form action="{{ route('product.checkout-create', $item->id)}}" method="post" id="authForm">
                  @csrf
                  
                  <p style="margin-bottom: -1px">Tempat Lahir</p>
                  <input
                  name="tempat_lahir"
                    type="text"
                    class="form-control mb-2 mr-sm-2"
                    id="inputTempatLahir"
                  />
                  
                  <p style="margin-bottom: -1px">Tanggal Lahir</p>
                  <input
                  name="tanggal_lahir"
                    type="date"
                    class="form-control mb-2 mr-sm-2"
                    id="inputTanggalLahir"
                    placeholder="Tanggal Lahir"
                  />

                  <p style="margin-bottom: -1px">Alamat</p>
                  <textarea 
                  name="alamat"
                  class="form-control mb-2 mr-sm-2"
                  id="alamat" 
                  cols="10" 
                  rows="3">
                </textarea>

                <p style="margin-bottom: -1px">Telepon</p>
                  <input
                  name="telepon"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputTelepon"
                  />

                  <p style="margin-bottom: -1px">Pekerjaan</p>
                  <input
                  name="pekerjaan"
                    type="text"
                    class="form-control mb-2 mr-sm-2"
                    id="inputPekerjaan"
                  />
                  
                  <p style="margin-bottom: -1px">Nomor Kartu Keluarga</p>
                  <input
                  name="no_kk"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputNoKk"
                  />

                  <p style="margin-bottom: -1px">Scan kartu Tanda Penduduk</p>
                  <input
                  name="scan_ktp"
                    type="file"
                    class="form-control mb-2 mr-sm-2"
                    id="inputScanKTP"
                  />

                  <p style="margin-bottom: -1px">Scan Kartu Keluarga</p>
                  <input
                  name="scan_kk"
                    type="file"
                    class="form-control mb-2 mr-sm-2"
                    id="inputScanKk"
                  />

                </form>
        </div>


          </div>
        </div>


        <div class="col-lg-4">
          <div class="card card-details card-right">
            <h2>Checkout Information</h2>
            <table class="trip-informations">
              <tr>
                <th width="50%">Masa Aktif</th>
                <td width="50%" class="text-right">{{ $item->masa_aktif }}</td>
              </tr>
              <tr>
                <th width="50%">Pendaftaran</th>
                <td width="50%" class="text-right"><div class="myDIV">{{ $item->product->register }}</div></td>
              </tr>
              <tr>
                <th width="50%">Harga Product</th>
                <td width="50%" class="text-right"><div class="myDIV">{{ $item->product->price }}</div></td>
              </tr>
              <tr>
                <th width="50%">Total</th>
                <td width="50%" class="text-right text-total">
                  <span class="text-blue"><div class="myDIV">{{ $item->transaction_total }}</div></span>
                </td>
              </tr>
            </table>

            <hr />
            <h2>Payment Instructions</h2>
            <p class="payment-instructions">
              Please complete your payment before to continue the wonderful
              trip
            </p>
            <div class="bank">
              <div class="bank-item pb-3">
                <img
                  src="{{ asset ('user/assets/img/ic_bsm.png')}}"
                  alt=""
                  class="bank-image"
                />
                <div class="description">
                  <h3>71.201.701.41</h3>
                  <p>
                    MASJID BAITUL HAQ PURIGADING
                    <br />
                    Bank Code [451]
                  </p>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="join-container">
            <button class="btn btn-block btn-join-now mt-3 py-2" type="submit" form="authForm">Daftar Sekarang</button>
          </div>
          <div class="text-center mt-3">
            <a href="#" class="text-muted">Cancel Daftar</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  </main>

@include('user.partials.footer')
@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.4.1.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey')}}">
</script>

<script src="{{ asset('user/assets/vendor/retina/retina.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/xzoom/dist/xzoom.min.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/gijgo/js/gijgo.min.js')}}"></script>
    <script>
        $(document).ready(function() {
          $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
          });
  
          $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
            uiLibrary: 'bootstrap4',
            icons: {
              rightIcon: '<img src="{{ asset('user/assets/img/ic_doe.png')}}" alt="" />'
            }
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





@endpush