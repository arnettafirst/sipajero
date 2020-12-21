@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Panen</h1>
        </div>

        <div class="section-body">
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Data Panen</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.harvest.update', $harvest->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <div class="input-group">
                                        <input id="month" type="date" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" name="month" value="{{ $harvest->month }}" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('month') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Hasil Panen</label>
                                    <div class="input-group">
                                        <input id="production" type="number" class="form-control{{ $errors->has('production') ? ' is-invalid' : '' }}" name="production" value="{{ $harvest->production }}" placeholder="Satuan KG">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('production') }}
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
    @include('admin.harvest.create')
@endsection
