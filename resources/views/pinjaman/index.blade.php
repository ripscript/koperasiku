@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Daftar Peminjam</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Peminjam</li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row mb-30">
    <div class="col-lg-12">
        <div class="card card-box">
            <div class="card-body">
                <table class="table table-hover table-striped text-center" id="tableDaftarPinjamans">
                    <thead class="fw-bolder fs-5">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Besar Pinjaman</th>
                            <th>Jumlah Bulan</th>
                            <th>Angsuran Perbulan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjaman as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->anggota->nama }}</td>
                                <td>Rp.{{ number_format($item->besar_pinjaman) }}</td>
                                <td>{{ $item->jumlah_bulan }}</td>
                                <td>Rp.{{ number_format($item->angsuran_perbulan, 2) }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success btn-print" value="{{ $item->id }}">
                                        Print angsuran
                                    </button>
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
        $('.btn-print').on('click', function () {
            var btnId = $(this).val();
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "kamu akan print detail angsuran ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href="{{ route('pinjaman.print-pengajuan', '') }}" + "/" + btnId;
                }
            })
        });
        $('.currency').number(true, 0);
        
        var table = $('#tableDaftarPinjamans').DataTable({
            pageLength: 10,
        })
    </script>
@endpush