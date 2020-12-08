@extends('admin.templates.default')

@section('sub-judul','Reclye Bin Transaction')
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
                    <th>Donation Packages</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($item as $items => $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->donation_package->title }}</td>
                    <td>{{ $result->userable->name }}</td>
                    <td>{{ $result->transaction_total }}</td>
                    <td>{{ $result->transaction_status }}</td>
                    <td>
                        <a href="{{ route('transaction.restore', $result->id) }}" class="btn btn-info">
                        <i class="fa fa-undo-alt"></i> </a>

                        <form action="{{ route('transaction.kill', $result->id) }}" method="POST" class="d-inline">
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