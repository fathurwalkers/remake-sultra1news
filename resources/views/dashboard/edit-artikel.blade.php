@extends('layouts.dashboard-layouts')

@push('css')
<script src="https://cdn.tiny.cloud/1/0fzrtif8pxlg6kw3rfi13s2t5xzfaiqpavx3fiqci9ysvmva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .makescroll {
        border:2px solid #ccc;
         width:300px; height: 100px;
          overflow-y: scroll!important;
    }

    label {
        margin-left: 20px;
    }
    #datepicker {
        width:180px; margin: 0 20px 20px 20px;
    }
    #datepicker > span:hover{
        cursor: pointer;
    }
</style>

@endpush

@section('main-section')
    <div class="card">
        <div class="card-header bg-dark text-white text-bold">
            Tambah Berita 
            <a class="btn btn-danger btn-sm float-right" href="{{ route('daftar-artikel') }}" role="button">Kembali</a>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('post-tambah-artikel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="artikel_judul">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <textarea  name="artikel_isi">
                                                    
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

                                        <div class="row mb-2">
                                            <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-start inline">
                                                <input type="date" name="artikel_dibuat">  
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="row mx-auto">
                                            <div class="col-lg-12 col-sm-12 col-md-12 mx-auto d-flex justify-content-center">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="dropdown">
                                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Pilih Kategori Berita 
                                                            </button>
                                                            <div class="dropdown-menu makescroll" aria-labelledby="dropdownMenuButton">
                                                                @foreach ($kategori as $kat2)
                                                                    <a class="dropdown-item" href="#"><input class="" type="checkbox" name="kategori[]" value="{{ $kat2->id }}">&nbsp; {{ $kat2->kategori_name }}</a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mx-auto">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroupFileAddon01">Gambar Depan</span>
                                                    </div>
                                                    <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar">
                                                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mx-auto">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="input-group mt-1">
                                                    <div class="input-group-prepend">
                                                      <label class="input-group-text" for="inputGroupSelect01">Status Berita : </label>
                                                    </div>
                                                    <select class="custom-select" id="inputGroupSelect01" name="artikel_status">
                                                      <option selected>Choose...</option>
                                                      <option value="published">Published</option>
                                                      <option value="draft">Draft</option>
                                                      <option value="review">Review</option>
                                                    </select>
                                                  </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="mt-2 col-sm-12 col-md-12 col-lg-12">
                            <button type="submit" class="mt-2 btn btn-info float-right">Posting</button>
                        </div>
                    </div>
                </form>
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