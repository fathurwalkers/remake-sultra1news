@extends('layouts.home-layouts')

{{-- {{ dd($artikel_random_3) }} --}}

@section('recent-articles')
<div class="recent-articles mt-2">
    <div class="container">
       <div class="recent-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Recent Articles</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="recent-active dot-style d-flex dot-style">
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{ asset('assets/aznews') }}/assets/img/news/recent1.jpg" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{ asset('assets/aznews') }}/assets/img/news/recent2.jpg" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{ asset('assets/aznews') }}/assets/img/news/recent3.jpg" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{ asset('assets/aznews') }}/assets/img/news/recent2.jpg" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>           
{{-- Pagination --}}
<div class="pagination-area pb-45 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                          <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                          <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Pagination --}}
@endsection

@section('trending-top')
    @foreach ($artikel_trendingtop as $artikeltop)
    <div class="trending-top mb-30">
        <div class="trend-top-img">
            <img src="{{ asset('post-images/') }}/{{ $artikeltop->artikel_headergambar }}" alt="" width="750" height="400">
            <div class="trend-top-cap">
                @foreach ($artikeltop->kategori as $kategoriname2)
                    <span>
                        {{ $kategoriname2->kategori_name }}
                    </span>
                @endforeach
                <h2><a href="details.html">{{ Str::limit($artikeltop->artikel_judul, 45) }}</a></h2>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('trending-bottom')
<div class="trending-bottom">
    <div class="row">
        @foreach ($artikel_random_3 as $artikelrandom3)
            <div class="col-lg-4">
                <div class="single-bottom mb-35">
                    <div class="trend-bottom-img mb-30">
                        <img src="{{ asset('post-images/') }}/{{ $artikelrandom3->artikel_headergambar }}" alt="" width="240" height="160">
                    </div>
                    <div class="trend-bottom-cap">
                        @foreach ($artikelrandom3->kategori as $kategoriname2)
                            <span class="color3">
                                {{ $kategoriname2->kategori_name }}
                            </span>
                        @endforeach
                        <h4><a href="details.html">{{ Str::limit($artikelrandom3->artikel_judul, 40) }}</a></h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

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
</div>
@endsection
