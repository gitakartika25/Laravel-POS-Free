@extends('layouts.app')

@section('content')
<main role="main" class="container"><br><br>

    <div class="starter-template" style="margin-bottom: 15px;">
        <h3>Edit User</h3><br>
        <a href="{{ route('manageusers') }}" class="btn btn-outline-info">< Kembali ke Kelola User</a>
    </div>

<body>
    <form action="/users/updateUser/{{ $user->id }}" method="POST"enctype="multipart/form-data" class="clearfix">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}"><br>
        <div class="form-group">
            <label for="title">Nama</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

             </div>
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
        @if(Auth::user()->id != $user->id)

        </div>
        <div class="form-group">
            <label for="roles">Roles</label>

            <select name="roles" class="form-control" id="roles">
                <optgroup label="Current user">
                    <option value="{{ $user->roles }}">{{ $user->roles }}</option>
                </optgroup>
                <optgroup label="Change user">
                    <option value="User">User</option>
                    <option value="Administrator">Administrator</option>
                     <button type="submit" name="add" class="btn btn-primary float-right">Update Data</button>
                </optgroup>
            </select><br>
              <button type="submit" name="add" class="btn btn-primary float-right">Update Data</button>
        </div>
       
    </form>
    @endif
</main>
@endsection