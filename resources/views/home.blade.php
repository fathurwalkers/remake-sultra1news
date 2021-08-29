@extends('layouts.home-layouts')

{{-- @foreach ($artikel_5 as $artikel)
    {{ dump($artikel->kategori) }}
@endforeach --}}

@section('right-content')
<div class="col-lg-4">
    @php $iter = [1, 3, 4]
    @endphp
    @foreach ($artikel_5 as $artikel_right)
    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="{{ asset('post-images/') }}/{{ $artikel_right->artikel_headergambar }}" alt="" width="120" height="100">
        </div>
        <div class="trand-right-cap">
                {{-- @foreach ($artikel_right as $artikel) --}}
                    @foreach ($artikel_right->kategori as $kategoriname)
                        <span class="color{{ Arr::random($iter) }}">
                            {{ $kategoriname->kategori_name }}
                        </span>
                    @endforeach
                {{-- @endforeach --}}
            <h4><a href="details.html">{{ $artikel_right->artikel_judul }}</a></h4>
        </div>
    </div>
    @endforeach
    {{-- <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="{{ asset('assets/aznews') }}/assets/img/trending/right2.jpg" alt="">
        </div>
        <div class="trand-right-cap">
            <span class="color3">sea beach</span>
            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
        </div>
    </div>
    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="{{ asset('assets/aznews') }}/assets/img/trending/right3.jpg" alt="">
        </div>
        <div class="trand-right-cap">
            <span class="color2">Bike Show</span>
            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
        </div>
    </div> 
    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="{{ asset('assets/aznews') }}/assets/img/trending/right4.jpg" alt="">
        </div>
        <div class="trand-right-cap">
            <span class="color4">See beach</span>
            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
        </div>
    </div>
    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="{{ asset('assets/aznews') }}/assets/img/trending/right5.jpg" alt="">
        </div>
        <div class="trand-right-cap">
            <span class="color1">Skeping</span>
            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
        </div>
    </div> --}}
</div>
@endsection
