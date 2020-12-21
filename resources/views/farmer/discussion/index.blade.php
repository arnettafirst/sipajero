@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Diskusi</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Diskusi</h4>
                            <div class="card-header-action">
                                <a href="{{ route('farmer.discussion.create') }}" class="btn btn-primary">
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
                                        <th>Penulis</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($discussions as $i => $discussion)
                                        <tr>
                                            <td class="text-center">
                                                {{ $i+1 }}
                                            </td>
                                            <td>{{ $discussion->created_at }}</td>
                                            <td>{{ $discussion->title }}</td>
                                            <td>{{ Auth::user()->firstname }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('farmer.discussion.show', $discussion->slug) }}" class="btn btn-primary ml-3">Show</a>
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
                                {{ $discussions->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
