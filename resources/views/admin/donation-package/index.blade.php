@extends('admin.templates.default')

@section('sub-judul','Donation Packages')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <a href="{{ route('donation-package.create')}}" class="btn btn-primary" style="float: right;"> <i class="fas fa-plus fa-sm text-white-50"></i> Create Donation Packages</a>
        <div class="table-responsive">
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>About</th>
                    <th>Type</th>
                    <th>Completion Date</th>
                    <th>Target Donation</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $key => $item)
                <tr>
                <td>{{ $key + 1 }}</td>
                    <td>{{ substr($item->title, 0, 20) }} ...</td>
                    <td>{!! substr($item->about, 0, 10) !!} ...</td>
                    <td>{{ $item->type }}</td>
                    @if ($item->target_waktu >= now())
                    <td> <span class="badge badge-pill badge-primary"><i class="fa fa-check" aria-hidden="true"></i></span>
                        {{ $item->target_waktu }}
                    </td>
                    @else
                    <td> <span class="badge badge-pill badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                        {{ $item->target_waktu }}
                    </td>
                    @endif
                    <td>Rp. {{ $item->target_dana }}</td>
                    
                    <td>
                        <a href="{{ route('donation-package.edit', $item->id) }}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i></a>

                        <form action="{{ route('donation-package.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Data kosong</td>

                </tr>
                @endforelse
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
    $('#tablepost').dataTable()
})
</script>
@endpush