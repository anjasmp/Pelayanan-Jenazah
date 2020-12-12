@extends('admin.templates.default')

@section('sub-judul','Detail Transaction')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px; ">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        

    <table class="table table-bordered">
        
        <tr>
            <th>ID</th>
            <td>{{ $item->id }}</td>
        </tr>
        <tr>
            <th>Product</th>
            <td>{{ $item->product->title }}</td>
        </tr>
        <tr>
            <th>Nama Penanggung Jawab</th>
            <td>{{ $item->user->name }}</td>
        </tr>
    
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $userdetail->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $userdetail->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $userdetail->alamat }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $userdetail->telepon }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $userdetail->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Nomor Kartu Keluarga</th>
            <td>{{ $userdetail->no_kk }}</td>
        </tr>
        <tr>
            <th>Scan KTP</th>
            <td>{{ $userdetail->scan_ktp }}</td>
        </tr>
        <tr>
            <th>Scan KK</th>
            <td>{{ $userdetail->scan_kk }}</td>
        </tr>

        @if ($item->details != FALSE)
        <tr>
            <th>Anggota Keluarga</th>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>NIK</th>
                        <th>Nama</th>
                    </tr>
                    @foreach ($item->details as $detail)
                    <tr>
                        
                        <td>{{ $detail->id }}</td>
                        <td>{{ $detail->nik }}</td>
                        <td>{{ $detail->name }}</td>
                        
                    </tr>
                    @endforeach

                </table>
            </td>
        </tr>
        @endif

        <tr>
            <th>Masa Aktif</th>
            <td>{{ $item->masa_aktif }}</td>
        </tr>
        <tr>
            <th>Transaction Total (Rp)</th>
            <td><div class="myDIV"> {{ $item->transaction_total }}</div></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $item->transaction_status }}</td>
        </tr>



    </table>

    <a href="{{ route('transaction-product.index')}}" class="btn btn-primary">
        <i class="fa fa-chevron-left"></i>
        </a>
    


    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'about' );
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