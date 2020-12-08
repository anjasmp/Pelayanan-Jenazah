@extends('user.default')

@include('user.partials.header')

@section('content')


@include('user.homepage.intro')

<hr style="width: 40%; margin-bottom: 100px; margin-top: -50px;"/>

@include('user.homepage.acarainfo')

<hr style="width: 40%;"/>

@include('user.homepage.infaqwakaf')

<hr style="width: 40%;"/>

@include('user.homepage.services')

<hr style="width: 40%;"/>

@include('user.homepage.contact')


<!-- ======= Footer ======= -->
@include('user.partials.footer')


@endsection