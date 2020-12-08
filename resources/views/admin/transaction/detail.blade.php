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
            <th>Donation Packages</th>
            <td>{{ $item->donation_package->title }}</td>
        </tr>
        <tr>
            <th>Donatur</th>
            <td>{{ $item->userable->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $item->userable->email }}</td>
        </tr>
        <tr>
            <th>Nomor</th>
            <td>{{ $item->userable->no_handphone }}</td>
        </tr>
        <tr>
            <th>Transaction Total (Rp)</th>
            <td><div class="myDIV">{{ $item->transaction_total }}</div></td>
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