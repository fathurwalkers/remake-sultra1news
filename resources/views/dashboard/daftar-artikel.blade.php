@extends('layouts.dashboard-layouts')

@section('main-section')
<div class="card">
    <div class="card-header bg-dark text-white text-bold">
            Semua Postingan
        <a class="btn btn-success btn-sm float-right" href="{{ route('tambah-artikel') }}" role="button">Tambah Postingan</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Penulis</th>
                <th>Tanggal Posting</th>
                <th>Kelola</th>
            </tr>
        </thead>
            <tbody>
            @foreach ($data as $artikel)
                <tr>
                    <td>{{ Str::limit($artikel->artikel_judul, 55, '...') }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="container">
                            <div class="row m-0 p-0">
                                <div class="col-sm-12 col-lg-12 col-md-12 mx-auto text-center">
                                    <a class="btn btn-success btn-sm" href="#" role="button">Lihat</a>
                                    <a class="btn btn-primary btn-sm" href="#" role="button">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="#" role="button">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        } );
    </script>
@endpush
