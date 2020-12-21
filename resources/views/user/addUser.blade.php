@extends('layouts.app')

@section('content')
<main role="main" class="container"><br>

    <div class="starter-template" style="margin-bottom: 15px;">
        <h3>Tambah User</h3><br>
        <a href="{{ route('manageusers') }}" class="btn btn-outline-info">< Kembali ke Kelola User</a>
    </div>

    <form action="/users/createUser" method="POST"  enctype="multipart/form-data" class="clearfix">
        @csrf
        <div class="form-group">
            <label for="title">Nama</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
             <div class="form-group">
                                    <label>Upload Foto Profil</label>
                                    <div>
                                        <div class="custom-file">
                                            <br>
                                            <input name="image" id="image" type="file" class="custom-file-input"
                                                accept="image/*"
                                                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"><label
                                                class="custom-file-label">Choose File</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12"><img id="output" src="" class="img-fluid"></div>
                                    @include('layouts.error', ['name' => 'image'])
                                </div>
                            </div>

        </div>
        </div>
        <div class="form-group">
            <label for="image">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            
        <div class="form-group">
            <label for="image">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"

            name="password_confirmation" required autocomplete="new-password">

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" name="add" class="btn btn-primary float-right">{{ __('Tambah User') }}</button>
    </form>

</main>
@endsection