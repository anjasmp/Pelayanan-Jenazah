@extends('admin.templates.default')

@section('sub-judul','Edit Gallery')
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

    <form action="{{ route('gallery.update', $item->id )}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="donation_packages_id">Donation Packages</label>
            <select name="donation_packages_id" required class="form-control">
            <option value="{{ $item->donation_packages_id }}">Don't Change</option>
                @foreach ($donation_packages as $donation_package)
            <option value="{{ $donation_package->id }}">
                {{ $donation_package->title }}
            </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" placeholder="image">

        </div>
        <button type="submit" class="btn btn-primary btn-block">Update</button>
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