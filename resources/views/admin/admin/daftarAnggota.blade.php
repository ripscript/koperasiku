@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Daftar Anggota</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Daftar Anggota</h4>
            </div>
            <div class="pb-20">
                <table class="table stripe hover nowrap text-center" id="daftarAnggota">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No</th>
                            <th>Nama</th>
                            <th>Simpanan Pokok</th>
                            <th>Alamat</th>
                            <th>Tanggal Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($daftarAnggota as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->simpanan_pokok }}</td>
                                <td>
                                    @if ($item->alamat == null)
                                        -
                                    @else
                                        {{ $item->alamat }}
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-icon btn-success">
                                        <i class="icon-copy dw dw-edit-2"></i>
                                    </a>

                                    <a class="btn btn-sm btn-icon btn-danger btn-delete" btnId="{{$item->id}}">
                                        <i class="icon-copy dw dw-delete-3 text-light"></i>
                                    </a>
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

@push('scripts')
    <script>
        $('.btn-delete').on('click', function(){
            var btnId = $(this).attr('btnId');
            console.log(btnId);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href="{{ route('anggota.hapus-anggota', '') }}" + "/" + btnId;
                }
            })
        })

        var daftarAdmin = $('#daftarAnggota').DataTable({});
    </script>
@endpush