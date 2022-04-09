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
            <div class="card-header d-flex align-item-center">
                <h4 role="button">Tambah Data</h4>
            </div>

            <form action="{{ route('anggota.tambah-anggota.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">Nama Lengkap</label>
                        </div>
    
                        <div class="col-lg-8">
                            <input name="namaLengkap" type="text" class="form-control" value="{{ old('namaLengkap') }}" placeholder="Input nama disini ...." required>
                        </div>
                    </div>
    
                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">Alamat</label>
                        </div>
    
                        <div class="col-lg-8">
                            <textarea name="alamat" class="form-control" placeholder="Masukan alamat yang sesuai ...">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
    
                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">TTL</label>
                        </div>
    
                        <div class="col-lg-8">
                            <input name="ttl" type="ttl" class="form-control" placeholder="Masukan TTL disini ...." required value="{{ old('ttl') }}">
                        </div>
                    </div>

                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">Pekerjaan</label>
                        </div>
    
                        <div class="col-lg-8">
                            <input name="pekerjaan" type="pekerjaan" class="form-control" placeholder="Masukan pekerjaan disini ...." required value="{{ old('pekerjaan') }}">
                        </div>
                    </div>

                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">Simpanan Pokok</label>
                        </div>
    
                        <div class="col-lg-8">
                            <input name="simpanan_pokok" type="simpanan_pokok" class="form-control" placeholder="Masukan Simpanan Pokok disini ...." required value="{{ old('simpanan_pokok') }}">
                        </div>
                    </div>
    
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    
@endpush