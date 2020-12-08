@extends('admin.templates.default')

@section('sub-judul','Create Penerimaan Lazhaq')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    

    <form class="mt-4" action="{{ route('penerimaan-lazhaq.store')}}" method="POST">
        @csrf
        <h4 class="card-title">Nama</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="name">
        </div>
        <h4 class="card-title">Jumlah</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="jumlah">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Save Penerimaan</button>
        </div>
    </form>

</div>


@endsection