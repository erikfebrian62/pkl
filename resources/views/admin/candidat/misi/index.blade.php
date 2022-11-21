@extends('layouts.mainadmin')

@section('tittle')
Visi Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <a href="{{ route('admin.kandidat.misi.create')}}" class="btn btn-success btn-sm sm-3 mt-3 float-end">Tambah Data <i class="bi bi-plus-square"></i></a>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Ketua & Wakil Ketua</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $candidate)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $candidate->ketua}} & {{ $candidate->wakil}}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.kandidat.misi.show', $candidate->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></i></a>
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

 {{-- sweet alert toast succsess --}}

 @push('js')
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
