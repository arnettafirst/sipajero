@extends('layouts.front')

@section('content')
    <section class="section">
        <div class="container">
            @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session()->get('success') }}
                    </div>
                </div>
            @endif
            <div class="row mt-5">
                <div class="container text-center">
                    @guest
                        <h1>INFORMASI</h1>
                    @elseif(Auth::user()->role == 'farmer')
                        <h1>INFORMASI</h1>
                    @elseif(Auth::user()->role == 'admin')
                        <h1>INFORMASI</h1>
                        <a class="btn btn-primary" href="{{ route('admin.information.create') }}">Tambah Data</a>
                    @endif
                </div>
            </div>
            <div class="row mt-5">
                @forelse($informations as $information)
                    <div class="col-12 col-lg-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image" data-background="{{ url('/storage/thumbnail/' . $information->thumbnail) }}"></div>
                        </div>
                        <div class="article-details">
                            <div class="article-category"><a>{{ $information->updated_at }}</a></div>
                            <div class="article-title">
                                <h2><a href="{{ route('information.detail', $information->slug) }}">{{ $information->title }}</a></h2>
                            </div>
                            <p>{{ $information->excerpt }}</p>
                            @guest
                                <div class="article-cta text-right">
                                    <a class="btn btn-primary" href="{{ route('information.detail', $information->slug) }}">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            @elseif(Auth::user()->role == 'farmer')
                                <div class="article-cta text-right">
                                    <a class="btn btn-primary" href="{{ route('information.detail', $information->slug) }}">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            @elseif(Auth::user()->role == 'admin')
                                <div class="article-cta d-flex justify-content-between">
                                    <form action="{{ route('admin.information.destroy', $information->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">Hapus Data</button>
                                    </form>
                                    <a class="btn btn-primary" href="{{ route('information.detail', $information->slug) }}">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            @endif
                        </div>
                    </article>
                </div>
                @empty
                    <div class="col-12 text-center">
                        @guest
                            <p>Admin belum memberikan informasi apapun</p>
                        @elseif(Auth::user()->role == 'farmer')
                            <p>Admin belum memberikan informasi apapun</p>
                        @elseif(Auth::user()->role == 'admin')
                            <p>Anda belum memberikan informasi apapun</p>
                        @endif
                    </div>
                @endforelse
            </div>
            <div class="row mt-5 justify-content-center">
                <nav class="d-inline-block">
                    {{ $informations->links() }}
                </nav>
            </div>
        </div>
    </section>
@endsection
