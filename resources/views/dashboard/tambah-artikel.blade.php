@extends('layouts.dashboard-layouts')

@push('css')
<script src="https://cdn.tiny.cloud/1/0fzrtif8pxlg6kw3rfi13s2t5xzfaiqpavx3fiqci9ysvmva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('main-section')
    <div class="card">
        <div class="card-header bg-dark text-white text-bold">
            Tambah Postingan 
            <a class="btn btn-danger btn-sm float-right" href="{{ route('daftar-artikel') }}" role="button">Kembali</a>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-8 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Judul : </span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <textarea>
                                                Welcome to TinyMCE!
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <textarea>
                                                Welcome to TinyMCE!
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
@endpush