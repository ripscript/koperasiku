@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Tambah Anggota</h4>
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
                <h5 role="button">Tambah Anggota</h5>
            </div>

            <form action="{{ route('admin.update-anggota', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">Nama Lengkap</label>
                        </div>
    
                        <div class="col-lg-8">
                            <input name="namaLengkap" type="text" class="form-control" value="{{ $admin->nama }}" placeholder="Input nama disini ...." required>
                        </div>
                    </div>
    
                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">Alamat</label>
                        </div>
    
                        <div class="col-lg-8">
                            <textarea name="alamat" class="form-control" placeholder="Masukan alamat yang sesuai ...">{{ $admin->alamat }}</textarea>
                        </div>
                    </div>
    
                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">Email</label>
                        </div>
    
                        <div class="col-lg-8">
                            <input name="email" type="email" class="form-control" placeholder="Input email disini ...." required value="{{ $admin->email }}">
                        </div>
                    </div>
    
                    <div class="row mb-10">
                        <div class="col-lg-4 d-flex align-item-center">
                            <label class="form-label mb-0 pb-0">Password</label>
                        </div>
    
                        <div class="col-lg-8">
                            <input name="password" type="password" maxlength="8" class="form-control" placeholder="Input password disini ....">
                        </div>
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