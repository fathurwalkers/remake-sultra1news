@extends('layouts.dashboard-layouts')

@section('main-section')
    @if (session('gagal_beralih'))
        <div class="alert alert-danger">
            {{ session('gagal_beralih') }}
        </div>
    @endif
@endsection