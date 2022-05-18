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
                    <li class="breadcrumb-item active" aria-current="page">Anggota</li>
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
                <table class="table table-hover table-striped text-center" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>Simpanan Pokok</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tempat . ', ' . date('d F Y', strtotime($item->tanggal_lahir)) }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>Rp.{{ number_format($item->simpanan_pokok, 0) }}</td>
                                <td>{{ $item->created_at }}</td>
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
        var table = $('#table').DataTable({})
    </script>
@endpush