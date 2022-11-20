@extends('layouts.mainadmin')

@section('title')
Biodata Siswa
@endsection

@section('content')
<div class="container">
    <div class="my-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Import <i class="bi bi-database-add"></i>
        </button>
        <a href="{{ route('admin.biodata.export') }}" class="btn btn-info mt-y">Export <i class="bi bi-file-earmark-text"></i></a>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <div class="my-1 col-12 p-2">
                        <form action="{{ route('admin.biodata.index') }}" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" placeholder="search" value="{{ request('search') }}">
                                <button class="input-group-text"><i class="bi bi-search mb-2"></i></button>
                            </div>
                        </form>
                    </div>
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $user->nis }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->class }}</td>
                                <td class="text-center">{{ $user->jurusan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.biodata.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}" data-nama="{{ $user->name }}"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="exampleModalLabel">Import Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="my-3">
                <form action="{{ route('admin.biodata.imports') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mb-3">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                      </div>
                </form>
            </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
   <script>

       $('.delete').click( function(){

           var userid = $(this).attr('data-id');
           var username = $(this).attr('data-nama');
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Akan menghapus nama data user "+username+"" ,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, batal!',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/informasi-biodata/"+userid+""
                        swalWithBootstrapButtons.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                        )
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Data aman :)',
                        'error'
                        )
                    }
                    });
        });


   </script>
@endpush
