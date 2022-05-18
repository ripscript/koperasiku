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
            <form action="{{ route('anggota.tambah-anggota.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <label class="form-label">Nama Lengkap</label>
                            <input name="namaLengkap" type="text" class="form-control @error ('namaLengkap') is-invalid @enderror" placeholder="Masukan nama disini..." value="{{ old('namaLengkap') }}">
                            @error('namaLengkap')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label">Tempat</label>
                                    <input name="tempat" type="text" class="form-control @error ('tempat') is-invalid @enderror" placeholder="Masukan tempat lahir disini..." value="{{ old('tempat') }}">
                                    @error('tempat')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="col-lg-6">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input name="tanggalLahir" type="date" class="form-control @error ('tanggalLahir') is-invalid @enderror" value="{{ old('tanggalLahir') }}">
                                    @error('tanggalLahir')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label required">Pekerjaan</label>
                                    <input name="pekerjaan" type="text" class="form-control @error ('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan') }}">
                                    @error('pekerjaan')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="col-lg-6">
                                    <label class="form-label">Simpanan Pokok</label>
                                    <input name="simpananPokok" type="text" class="form-control currency @error ('simpananPokok') is-invalid @enderror" value="{{ old('simpananPokok') }}">
                                    @error('simpananPokok')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-lg-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control @error ('alamat') is-invalid @enderror" placeholder="Masukan alamat disini..." style="height: 100px !important">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-block btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('.currency').number(true, 0);
        
        var table = $('#table').DataTable({})
    </script>
@endpush