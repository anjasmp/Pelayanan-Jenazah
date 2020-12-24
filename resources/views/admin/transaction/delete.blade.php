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
                    <th>No</th>
                    <th>Product</th>
                    <th>Nama</th>
                    <th>Total (Rp)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($item as $key => $result)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ substr($result->product->title, 0, 20) }}...</td>
                    <td>{{ $result->user->name }}</td>
                    <td><div class="myDIV">{{ $result->transaction_total }}</div></td>

                    <td>{{ $result->transaction_status }}</td>
                    <td>
                        <a href="{{ route('transaction-product.restore', $result->id) }}" class="btn btn-info">
                        <i class="fa fa-undo-alt"></i> </a>

                        <form action="{{ route('transaction-product.kill', $result->id) }}" method="POST" class="d-inline">
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