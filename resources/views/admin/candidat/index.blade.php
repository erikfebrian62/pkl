@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.create') }}" class="btn btn-success btn-sm mt-3">Tambah Data <i class="bi bi-plus-square"></i></a>
    <a href="{{ route('admin.kandidat.visi.index') }}" class="btn btn-primary btn-sm mt-3 float-end ms-2">Kelola Visi</a>
    <a href="{{ route('admin.kandidat.misi.index') }}" class="btn btn-primary btn-sm mt-3 float-end ms-3">Kelola Misi</a>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Profile</th>
                        <th class="text-center">Ketua</th>
                        <th class="text-center">Wakil</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($candidate as $candidate)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center"><img src="/images/{{ $candidate->img }}" width="100px"></td>
                                <td class="text-center">{{ $candidate->ketua }}</td>
                                <td class="text-center">{{ $candidate->wakil }}</td>
                                <td class="text-center">
                                        <a href="{{ route('admin.kandidat.show', $candidate->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></i></a>
                                        <a href="{{ route('admin.kandidat.edit', $candidate->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm btndelete" data-id="{{ $candidate->id }}" data-nama="{{ $candidate->ketua }}"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>

        $('.btndelete').click( function(){

            var kandidatid = $(this).attr('data-id');
            var username = $(this).attr('data-nama');
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger me-2'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Akan menghapus data kandidat "+username+"" ,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, batal!',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/kandidat/"+kandidatid+""
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