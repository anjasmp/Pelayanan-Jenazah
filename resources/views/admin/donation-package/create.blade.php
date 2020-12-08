@extends('admin.templates.default')

@section('sub-judul','Create Donation Packages')
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

    <form action="{{ route('donation-package.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="title">About</label>
            <textarea class="form-control" name="about" id="about" rows="10">{{ old('about') }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Type</label>
        <input type="text" class="form-control" name="type" placeholder="Type" value="{{ old('type') }}">
        </div>
        <div class="form-group">
            <label for="title">Target Waktu</label>
        <input type="date" class="form-control" name="target_waktu" placeholder="Target Waktu" value="{{ old('target_waktu') }}">
        </div>
        <div class="form-group">
            <label for="title">Target Dana</label>
        <input type="number" class="form-control" name="target_dana" placeholder="Target Dana" value="{{ old('target_dana') }}">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>


    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'about' );
</script>
@endpush