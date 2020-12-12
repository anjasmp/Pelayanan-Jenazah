@extends('admin.templates.default')

@section('sub-judul','Tambah Gambar')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
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

    <form action="{{ route('gallery.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="donation_packages_id">Paket Pilihan</label>
            <select name="donation_packages_id" required class="form-control">
                <option value="">Pilih Paket</option>
                @foreach ($donation_packages as $donation_package)
            <option value="{{ $donation_package->id }}">
                {{ $donation_package->title }}
            </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Banner</label>
            <input type="file" class="form-control" name="image" placeholder="image">

        </div>
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>


    </div>
</div>


@endsection
