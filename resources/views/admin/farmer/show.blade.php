@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Petani</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card profile-widget" style="margin: 0">
                        <div class="card-header">
                            <h4>Profil Petani</h4>
                        </div>
                        <div class="card-body">
                            <div class="profile-widget-header text-center">
                                <img class="w-25 rounded-circle" alt="image" src="{{ url('/storage/photo/' . $farmer->photo) }}" class="rounded-circle">
                                <div class="profile-widget-name text-center text-primary font-weight-600 mt-3">{{ $farmer->username }}
                                    <div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div>
                                        {{ $farmer->role }}
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Nama Depan : {{ $farmer->firstname }}</li>
                                    <li class="list-group-item">Nama Belakang : {{ $farmer->lastname }}</li>
                                    <li class="list-group-item">Email : {{ $farmer->email }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Data Petani</h4>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @elseif(session()->get('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ session()->get('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('admin.farmer.update', $farmer->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="photo" type="file" class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ $farmer->photo }}">
                                            <label class="custom-file-label">Pilih file</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('photo') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label>Nama Depan</label>
                                        <div class="input-group">
                                            <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $farmer->firstname }}" placeholder="John" required>
                                            <div class="invalid-feedback">
                                                {{ $errors->first('firstname') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>Nama Belakang</label>
                                        <div class="input-group">
                                            <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $farmer->lastname }}" placeholder="Doe">
                                            <div class="invalid-feedback">
                                                {{ $errors->first('lastname') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <div class="input-group">
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $farmer->username }}" placeholder="johndoe" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('username') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $farmer->email }}" placeholder="email@address.com" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" value="{{ $farmer->old_password }}" placeholder="Minimal 8 karakter" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-12"></label>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
