@extends('admin.templates.default')

@section('sub-judul','Jadwal Sholat')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        
        <form action="{{ route('result')}}" method="get">
            <div class="form-group">
                <label for="exampleInputEmail1">Pilih Kabupaten/Kota</label>
               <select class="form-control" name="city" id="city">
                   {{-- @foreach ($cities as $city) --}}
                    <option value="Bekasi">Bekasi</option>
                    {{-- <option value="{{ $city['id'] }}">{{ $city['nama'] }}</option> --}}
                   {{-- @endforeach --}}
               </select>
            </div>
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Pilih Tanggal</label>
              <input type="date" name="time" id="time" class="form-control">
            </div> --}}
            <button type="submit" class="btn btn-success"> Save </button>
        </form>

    </div>
</div>


@endsection

@push('scripts')
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
</script> --}}

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

   <script type="text/javascript">
        $('#time').datepicker({
        format: 'yyyy-mm-dd',
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    </script>
@endpush