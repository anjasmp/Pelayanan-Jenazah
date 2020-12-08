@extends('admin.templates.default')

@section('sub-judul','Reclye Bin Donation Packages')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <div class="table-responsive">
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>About</th>
                    <th>Type</th>
                    <th>Completion Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($item as $items => $result)
                <tr>
                <td>{{ $result->id }}</td>
                    <td>{{ $result->title }}</td>
                    <td>{!! substr($result->about, 0, 20) !!}</td>
                    <td>{{ $result->type }}</td>
                    <td>{{ $result->target_waktu }}</td>
                    <td>
                        <a href="{{ route('donation-package.restore', $result->id) }}" class="btn btn-info">
                        <i class="fa fa-undo-alt"></i> </a>

                        <form action="{{ route('donation-package.kill', $result->id) }}" method="POST" class="d-inline">
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