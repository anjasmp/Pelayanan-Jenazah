@extends('admin.templates.default')

@section('sub-judul','Edit Penyaluran Lazhaq')
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

    

    <form class="mt-4" action="{{ route('penyaluran-lazhaq.update', $item->id)}}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <h4 class="card-title">Penerimaan Lazhaq</h4>
            <select class="form-control" name="penerimaan_lazhaqs_id" id="penerimaan_lazhaq_id">
                <option value="" holder>Select Penerimaan Lazhaq</option>
                @foreach($penerimaan as $result)
                <option value="{{ $result->id }}"
                    @if($item->penerimaan_lazhaqs_id == $result->id)
                    selected
                    @endif
                    >{{$result->name}}</option>
                @endforeach
            </select>
        </div>
        <h4 class="card-title">Nama</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$item->name}}">
        </div>

        <h4 class="card-title">Keterangan</h4>
        <div class="form-group">
            <textarea class="form-control" name="description" id="description"
                rows="10">{{ $item->description }}</textarea>
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

@push('scripts')
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'description' );
</script>
@endpush