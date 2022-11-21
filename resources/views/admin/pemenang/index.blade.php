@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="" class="btn btn-success btn-sm my-3" data-bs-toggle="modal" data-bs-target="#img">Tambah Data <i class="bi bi-plus-square"></i></a>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">image</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($pemenang as $pemenang)
                            <tr>
                                    <td class="text-center"><img src="{{ asset('images/'. $pemenang->img) }}" width="500px"></td>
                                    <td class="text-center">
                                            <a href="{{ route('admin.pemenang.show', $pemenang->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></i></a>
                                            <a href="{{ route('admin.pemenang.edit', $pemenang->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm btndelete" data-id="{{ $pemenang->id }}"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Struktur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="my-3">
                <form action="{{ route('admin.pemenang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mb-3">
                        <input type="file" name="img" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                      </div>
                </form>
            </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script>

        $('.btndelete').click( function(){

            var pemenangid = $(this).attr('data-id');
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger me-2'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Akan menghapus data pemenang" ,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, batal!',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/pemenang/"+pemenangid+""
                        swalWithBootstrapButtons.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success',
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

        {{-- sweet alert toast succsess --}}

        <script>
            @if (Session::has('success'))
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
    
            Toast.fire({
            icon: 'info',
            title: '{{ Session::get('success') }}'
            })
            @endif
        </script>
@endpush
