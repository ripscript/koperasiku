@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Tambah Pinjaman</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Pinjaman</li>
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
                <form action="{{ route('pinjaman.tambah-pinjaman.store') }}" method="post">
                    @csrf

                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-lg-12" >
                            <label class="form-label">Nama</label>
                            <select name="nama" class="custom-select @error ('nama') is-invalid @enderror">
                                @foreach ($anggota as $item)
                                    <option value="{{ $item->id }}" {{ (old('nama') == $item->id) ? 'selected':'' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('nama')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-lg-6">
                            <label class="form-label">Besar Pinjaman</label>
                            <input name="besarPinjaman" type="text" class="form-control currency @error ('besarPinjaman') is-invalid @enderror" placeholder="Masukan besar pinjaman..." autocomplete="off" value="{{ old('besarPinjaman') }}">
                            @error('besarPinjaman')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="form-label">Bulan</label>
                            <input name="bulan" type="number" min="1" max="24" class="form-control @error ('bulan') is-invalid @enderror" placeholder="Input jumlah bulan">
                            @error('bulan')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-block btn-primary">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('.currency').number(true, 0);
    </script>
@endpush