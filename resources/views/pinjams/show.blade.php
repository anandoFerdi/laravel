@extends('pinjams.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2> Show Data</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('pinjams.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar:</strong>
                <img src="{{ Storage::url('public/pinjam/').$pinjam->image }}" class="rounded" style="width: 150px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $pinjam->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kelas:</strong>
                {{ $pinjam->kelas }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alat Yang Dipinjam:</strong>
                {{ $pinjam->alat }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Peminjaman:</strong>
                {{ $pinjam->peminjaman }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pengembalian:</strong>
                {{ $pinjam->pengembalian }}
            </div>
        </div>
    </div>
@endsection
