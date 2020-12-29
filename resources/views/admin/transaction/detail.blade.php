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

        @foreach ($item->user_detail as $detail)
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $detail->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $detail->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $detail->alamat }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $detail->telepon }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $detail->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Nomor Kartu Keluarga</th>
            <td>{{ $detail->no_kk }}</td>
        </tr>
        <tr>
            <th>Scan KTP</th>
            <td><img src="{{ Storage::url($detail->scan_ktp) }}" alt="" style="width: 150px" class="img-thumbnail" /></td>
        </tr>
        <tr>
            <th>Scan KK</th>
            <td><img src="{{ Storage::url($detail->scan_kk) }}" alt="" style="width: 150px" class="img-thumbnail" /></td>
        </tr>

        @endforeach

     
        <tr>
            <th>Anggota Keluarga</th>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>tempat_lahir</th>
                        <th>tanggal_lahir</th>
                    </tr>
                    @forelse ($item->user_families as $detail)
                    <tr>
                        
                        <td>{{ $detail->nik }}</td>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->tempat_lahir }}</td>
                        <td>{{ $detail->tanggal_lahir }}</td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data kosong</td>
    
                    </tr>
                    @endforelse


                </table>
            </td>
        </tr>
    

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

    <a href="{{ route('transaction.index')}}" class="btn btn-primary">
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