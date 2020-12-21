@extends('layouts.app')

@section('content')
<main role="main"><br><br>

        <?php $total; ?>
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th colspan="7" class="text-center" scope="col">LAPORAN USER</th>
                </tr>
                <tr>
                    <th colspan="7" class="table-dark text-center">Daftar User</th>
                </tr>
            </thead>
            <tbody>
                @if($user->isEmpty())
                    <tr>
                        <td colspan="7" align="center">Data user kosong</td>
                    </tr>
                @else
                <?php $count = 0; ?>
                @foreach($user AS $u)
                    <tr>
                        <td rowspan="5">{{ $loop->iteration }}</td>
                        <td colspan="6">User ID : {{ $u->id }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" rowspan="4" align="center" style="overflow: hidden;">
                            @if($u->profile_image == 'empty')
                                <span align="center">empty</span>
                            @else
                                <img src="{{ public_path('storage/'.$u->profile_image) }}" alt="{{ $u->profile_image }}" width="80">
                            @endif
                        </td>
                        <td>Nama</td><td>{{ $u->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $u->email }}</td>
                    </tr>
                    <tr>
                        <td>Bergabung pada</td>
                        <td>{{ $u->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Roles</td>
                        <td><strong>{{ $u->roles }}</strong></td>
                    </tr>
                <?php $count++; ?>
                @endforeach
                    <tr>
                        <td colspan="6" class="text-center">Total Pengguna</td>
                        <td class="text-center">{{ $count }}</td>
                    </tr>
                   
                @endif
        </table>

    </main>
@endsection