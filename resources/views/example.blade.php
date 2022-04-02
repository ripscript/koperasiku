@extends('admin.layout.master')

@push('styles')
    
@endpush

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Daftar Admin</h4>
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
        
    </div>
</div>
@endsection

@push('scripts')
    
@endpush