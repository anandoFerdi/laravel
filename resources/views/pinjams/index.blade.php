@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Data Peminjam</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('pinjams.create') }}"> Create New Data</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Foto Siswa</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alat</th>
            <th>Peminjaman</th>
            <th>Pengembalian</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pinjam as $pin)
        <tr>
            <td>{{ ++$i }}</td>
            <td>
                <img src="{{ Storage::url('public/pinjam/').$pin->image }}" class="rounded" style="width: 150px">
            </td>
            <td>{{ $pin->nama }}</td>
            <td>{{ $pin->kelas }}</td>
            <td>{{ $pin->alat }}</td>
            <td>{{ $pin->peminjaman }}</td>
            <td>{{ $pin->pengembalian }}</td>
            <td>
                <form action="{{ route('pinjams.destroy',$pin->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('pinjams.show',$pin->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('pinjams.edit',$pin->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="row text-center">
        {!! $pinjam->links() !!}
    </div>
    </div>

@endsection

