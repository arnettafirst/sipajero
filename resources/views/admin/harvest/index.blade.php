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
                            <h4>Tabel Panen</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addHarvestModal">
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Bulan</th>
                                        <th>Jumlah Panen</th>
                                        <th>Peramalan</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($harvests as $i => $harvest)
                                        <tr>
                                            <td class="text-center">
                                                {{ $i+1 }}
                                            </td>
                                            <td>{{ $harvest->month }}</td>
                                            <td>{{ $harvest->production }}</td>
                                            <td>{{ $harvest->forecast }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('admin.harvest.edit', $harvest->id) }}" class="btn btn-primary ml-3">Edit</a>
                                                    <a class="ml-2">
                                                        <form action="{{ route('admin.harvest.destroy', $harvest->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                        </form>
                                                    </a>
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
                                {{ $harvests->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.harvest.create')
@endsection
