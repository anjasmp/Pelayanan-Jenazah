@extends('member-area.templates.default')

@section('judul','Daftar Anggota')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <a href="{{ route ('anggota.create')}}" class="btn btn-primary" style="float: right;"><i class="fas fa-plus fa-sm text-white-50"></i> Create Anggota</a>
        <div class="table-responsive">
        <table class="table table-striped" id="tableAnggota">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $key => $result)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->nik }}</td>
                    <td>{{ $result->tempat_lahir }}</td>
                    <td>{{ $result->tanggal_lahir }}</td>
                    <td>

                        <form action="{{ route('anggota.destroy', $result->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('anggota.edit', $result->id)}}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('user/assets/js/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#tableAnggota').dataTable()
})
</script>
@endpush