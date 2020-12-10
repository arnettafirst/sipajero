@extends('layouts.front')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row mt-5">
                <div class="container text-center">
                    @guest
                        <h1>DISKUSI</h1>
                    @elseif(Auth::user()->role == 'farmer')
                        <h1>DISKUSI</h1>
                        <a class="btn btn-primary" href="{{ route('farmer.discussion.create') }}">Tambah Data</a>
                    @elseif(Auth::user()->role == 'admin')
                        <h1>DISKUSI</h1>
                        <a class="btn btn-primary" href="{{ route('admin.discussion.create') }}">Tambah Data</a>
                    @endif
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group list-group-flush mt-1">
                                @forelse($discussions as $discussion)
                                    <a href="{{ route('discussion.detail', $discussion->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{ $discussion->title }}</h5>
                                            <small class="text-primary">{{ $discussion->created_at }}</small>
                                        </div>
                                        <p class="mb-1">{{ $discussion->excerpt }}</p>
                                        <small class="font-weight-600">{{ $discussion->user()->first()->firstname }}</small>
                                    </a>
                                @empty
                                    <div class="text-center">
                                        @guest
                                            <p>Tidak terdapat diskusi apapun saat ini</p>
                                            <a class="btn btn-primary w-25" href="#" data-toggle="modal" data-target="#loginModal">Mulai Diskusi Sekarang</a>
                                        @elseauth
                                            <p>Tidak terdapat diskusi apapun saat ini</p>
                                        @endif
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="card-footer text-center">
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
