@extends('index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @include('Halaman_depan.lokasi')
                @include('Halaman_depan.sensor')
            </div>
            <div class="row">
                @include('Halaman_depan.maps')
            </div>
        </div>
        @include('Halaman_depan.footer')
    </div>
    </div>
    </div>
@endsection
