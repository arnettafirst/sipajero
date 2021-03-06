@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Informasi</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Informasi</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.information.create') }}" class="btn btn-primary">
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
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($informations as $i => $information)
                                        <tr>
                                            <td class="text-center">
                                                {{ $i+1 }}
                                            </td>
                                            <td>{{ $information->updated_at }}</td>
                                            <td>{{ $information->title }}</td>
                                            <td>{{ $information->excerpt }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('admin.information.show', $information->slug) }}" class="btn btn-primary ml-3">Show</a>
                                                    <a class="ml-2">
                                                        <form action="{{ route('admin.information.destroy', $information->id) }}" method="POST">
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
                                {{ $informations->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
