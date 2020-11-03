<div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Depan</label>
            <div class="input-group">
                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" placeholder="John" required>
                <div class="invalid-feedback">
                    {{ $errors->first('firstname') }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Nama Belakang</label>
            <div class="input-group">
                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" placeholder="Doe">
                <div class="invalid-feedback">
                    {{ $errors->first('lastname') }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Username</label>
            <div class="input-group">
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="johndoe" required>
                <div class="invalid-feedback">
                    {{ $errors->first('username') }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <div class="input-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email@address.com" required>
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Password</label>
            <div class="input-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" placeholder="Minimal 8 karakter" required>
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <div class="input-group">
                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password_confirmation" placeholder="Masukkan kembali password Anda" required>
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </div>
    </form>
</div>
