@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
    <a href="users/register" class="btn btn-primary">Tambah Data</a><br><br>
    <a href="/users/cetak_pdf" class="btn btn-success float-right" target="_blank">CETAK PDF</a><br><br>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Tgl gabung</th>
                <th scope="col">Role</th>
                <th scope="col center" colspan="2" style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user AS $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage/'.$a->profile_image) }}" alt="{{ $a->profile_image }}" width="50" height="50">
                </td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->created_at }}</td>
                <td>{{ $a->roles }}</td>
                <td><a href="users/editUser/{{ $a->id }}" class="badge badge-warning">Edit</a></td>
                <td><a href="users/dropUser/{{ $a->id }}" class="badge badge-danger" onclick="return confirm('Hapus User  `{{ $a->name }}`')">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection