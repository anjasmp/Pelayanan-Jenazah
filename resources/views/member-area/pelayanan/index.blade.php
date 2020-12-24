@extends('member-area.templates.default')

@section('judul','Pelayanan')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        <h1 style="text-align: center;"><span style="color: #03877e;"> <br>PERMINTAAN PELAYANAN JENAZAH</span> </h1>
    </div>
    <div class="card-group">
        <div class="card border-center">
            <a href="{{ route ('pelayanan.create')}}" class="btn btn-danger">
            <div class="card-body">
                <h2>KLIK DISINI !</h2>
            </div>
            </a>
        </div>
    </div>
</div>


@endsection