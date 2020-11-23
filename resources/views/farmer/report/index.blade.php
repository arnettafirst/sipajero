@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data Laporan</h4>
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
                            <form method="POST" action="{{ route('farmer.report.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Judul</label>
                                    <div class="input-group">
                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Laporan</label>
                                    <div class="input-group">
                                        <textarea id="contents" class="form-control{{ $errors->has('contents') ? ' is-invalid' : '' }} summernote" name="contents" required>{{ old('contents') }}</textarea>
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
                <div class="col-12 col-md-6 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Laporan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reports as $i => $report)
                                        <tr>
                                            <td class="text-center">
                                                {{ $i+1 }}
                                            </td>
                                            <td>{{ $report->created_at }}</td>
                                            <td>{{ $report->title }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('farmer.report.show', $report->slug) }}" class="btn btn-primary ml-3">Show</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                {{ $reports->links() }}
                            </nav>
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
