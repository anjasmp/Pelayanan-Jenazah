@extends('member-area.templates.default')

@section('judul','Kirim Data')
@section('sub-judul','Pelayanan')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    <form action="{{ route('pelayanan.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama" value="">
        </div>
        <div class="form-group">
            <label for="nama">Nama Ayah Alm</label>
        <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah Alm" value="">
        </div>
        <div class="form-group">
            <label for="title">Tanggal Wafat</label>
            <input type="date" name="date" id="date" class="form-control" style="width: 100%; display: inline;">
        </div>
        <div class="form-group">
            <label for="title">Jam Wafat</label>
            <input type="time" class="form-control" name="jam_wafat" placeholder="Jam Wafat" value="">
        </div>
        <div class="form-group">
            <label for="title">Tempat Wafat </label>
        <input type="text" class="form-control" name="tempat_Wafat" placeholder="Tempat Wafat" value="">
        </div>
        <div class="form-group">
            <label for="title">Tempat Pemakaman</label>
        <input type="text" class="form-control" name="tempat_pemakaman" placeholder="Tempat Pemakanan" value="">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>

    

</div>


@endsection