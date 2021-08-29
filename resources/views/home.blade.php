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
                        @foreach ($artikel_paginate as $artikelpaginate)
                            <div class="single-recent mb-100">
                                <div class="what-img">
                                    <img src="{{ asset('post-images/') }}/{{ $artikelpaginate->artikel_headergambar }}" alt="" width="360" height="335">
                                </div>
                                <div class="what-cap">
                                    @foreach ($artikelpaginate->kategori as $kategoripaginate)
                                        <span class="color3">
                                            {{ $kategoripaginate->kategori_name }}
                                        </span>
                                    @endforeach
                                    <h4><a href="#">{{ $artikelpaginate->artikel_judul }}</a></h4>
                                </div>
                            </div>
                        @endforeach
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
                        {{-- <ul class="pagination justify-content-start">
                          <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                          <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                        </ul> --}}
                        {{ $artikel_paginate->links() }}
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

@section('weekly-one')
<div class="weekly-news-area pt-50">
    <div class="container">
       <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Weekly Top News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        @foreach ($artikelweekly_one as $weeklyone)
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="{{ asset('post-images/') }}/{{ $weeklyone->artikel_headergambar }}" alt="" width="360" height="420">
                                </div>
                                <div class="weekly-caption">
                                    @foreach ($weeklyone->kategori as $kategoriname_weeklyone)
                                        <span class="color4">
                                            {{ $kategoriname_weeklyone->kategori_name }}
                                        </span>
                                    @endforeach
                                    <h4><a href="#">{{ $weeklyone->artikel_judul }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>    
@endsection

@section('weekly-two')
<div class="weekly2-news-area  weekly2-pading gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Weekly Top News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex dot-style">
                        @foreach ($artikelweekly_two as $weeklytwo)
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img src="{{ asset('post-images/') }}/{{ $weeklytwo->artikel_headergambar }}" alt="" width="263" height="170">
                                </div>
                                <div class="weekly2-caption">
                                    @foreach ($weeklytwo->kategori as $kategoriname_weeklytwo)
                                        <span class="color3">
                                            {{ $kategoriname_weeklytwo->kategori_name }}
                                        </span>
                                    @endforeach
                                    <p>{{ date("D, M - Y", strtotime($weeklytwo->artikel_dibuat)) }}</p>
                                    <h4><a href="#">{{ $weeklytwo->artikel_judul }}</a></h4>
                                </div>
                            </div> 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>       
@endsection
