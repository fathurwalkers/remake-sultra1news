@extends('layouts.dashboard-layouts')

@section('main-section')
<div class="card">
    <div class="card-header bg-dark text-white text-bold">
            Semua Postingan - REVIEW 
        <a class="btn btn-success btn-sm float-right" href="{{ route('tambah-artikel') }}" role="button">Tambah Postingan</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-responsive" style="width:100%">
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
                    <td>{{ Str::limit($artikel->artikel_judul, 45, '...') }}</td>

                    @switch($artikel->artikel_status)
                        @case('published')
                        <td><button class="btn btn-sm btn-success">{{ strtoupper($artikel->artikel_status) }}</td>        
                            @break
                        @case('draft')
                        <td><button class="btn btn-sm btn-danger">{{ strtoupper($artikel->artikel_status) }}</td>        
                            @break
                        @case('review')
                        <td><button class="btn btn-sm btn-info">{{ strtoupper($artikel->artikel_status) }}</td>        
                            @break
                    @endswitch

                    @if (!$artikel->login->name)
                        <td>Admin</td>
                    @else
                        <td>{{ $artikel->login->name }}</td>                    
                    @endif
                    <td>{{ date("D, M - Y", strtotime($artikel->artikel_dibuat)) }}</td>
                    <td>
                        <div class="container">
                            <div class="row m-0 p-0">
                                <div class="col-sm-12 col-lg-12 col-md-12 mx-auto text-center">
                                    <a class="btn btn-success btn-sm" href="#" role="button">Lihat</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit-artikel', $artikel->id) }}" role="button">Edit</a>
                                    {{-- <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
                                        Hapus
                                        {{ $artikel->id }}
                                    </a> --}}
                                    <form action="{{route('delete-artikel', [$artikel->id])}}" class="d-inline"
                                        onsubmit="return confirm('Klik OK, jika ingin menghapus data?{{ $artikel->id }}')" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete {{ $artikel->id }}">
                                    </form>
                                    {{-- <form action="{{ route('delete-artikel') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" role="button">Hapus</button>
                                    </form> --}}

                                    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                            {{ $artikel->id }}
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div> --}}

                                    {{-- <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah anda yakin ingin menghapus Postingan ini?</div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('delete-artikel', [$artikel->id]) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" value="{{ $artikel->id }}" name="post_id">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Batalkan</a>
                                                        <button class="btn btn-primary" type="submit">Hapus
                                                            {{ $artikel->id }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
{{-- <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus Postingan ini?</div>
            <div class="modal-footer">
                <form action="{{ route('delete-artikel', $) }}" method="POST">
                    @csrf
                    <a class="btn btn-secondary" data-dismiss="modal">Batalkan</a>
                    <button class="btn btn-primary" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        } );
    </script>
@endpush
