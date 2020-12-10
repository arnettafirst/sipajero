@extends('layouts.front')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <section class="section">
        <div class="container">
            @if($errors->any())
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
            @endif
            <div class="row justify-content-center mt-5">
                <h1>Ubah Data Diskusi</h1>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.discussion.update', $discussion->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Judul</label>
                                    <div class="input-group">
                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $discussion->title }}" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Konten</label>
                                    <div class="input-group">
                                        <textarea id="contents" class="form-control{{ $errors->has('contents') ? ' is-invalid' : '' }} summernote" name="contents" required>{{ $discussion->contents }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('contents') }}
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
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection
