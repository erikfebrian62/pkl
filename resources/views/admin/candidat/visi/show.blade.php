@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.visi.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ketua" value="{{ $candidates->ketua}} & {{ $candidates->wakil}}" id="floatingInput" placeholder="Ketua" disabled>
                <label for="floatingInput">Ketua & Wakil</label>
            </div>

            @foreach ($visi as $item )

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Visi" name="visi" value="" id="floatingTextarea" style="height: 150px" disabled>{{ $item->visi }}
                </textarea>
                <label for="floatingTextarea">visi</label>
            </div>

            <a href="#" class="btn btn-danger btn-sm float-end btndelete" data-id="{{ $item->id }}"><i class="bi bi-trash"></i></a>
            <a href="{{ route('admin.kandidat.visi.edit', $item->id) }}" class="btn btn-warning btn-sm me-2 float-end btn"><i class="bi bi-pencil-square"></i></a>
            @endforeach
        </div>
    </div>
</div>
@endsection


@push('js')
    <script>

        $('.btndelete').click( function(){

            var kandidatmisiid = $(this).attr('data-id');
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
                        window.location = "/admin/kandidat/visi/"+kandidatmisiid+"/delete"
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
@endpush
