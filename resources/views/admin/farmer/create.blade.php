<div class="modal fade" id="addFarmerModal" tabindex="-1" role="dialog" aria-labelledby="addFarmerModal"
     aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.farmer.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Foto Profil</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input id="photo" type="file" class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" required>
                                <label class="custom-file-label">Pilih file</label>
                            </div>
                        </div>
                    </div>
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
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
