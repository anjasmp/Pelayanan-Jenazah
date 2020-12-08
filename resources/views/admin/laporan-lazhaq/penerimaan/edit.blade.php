@extends('admin.templates.default')

@section('sub-judul','Edit Penerimaan Lazhaq')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success')}}
    </div>
    @endif

    

    <form class="mt-4" action="{{ route('penerimaan-lazhaq.update', $item->id)}}" method="POST">
        @csrf
        @method('patch')
        <h4 class="card-title">Nama</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$item->name}}">
        </div>

        <h4 class="card-title">Jumlah</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="jumlah" value="{{$item->jumlah}}">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Update Penerimaan</button>
        </div>
    </form>

</div>


@endsection