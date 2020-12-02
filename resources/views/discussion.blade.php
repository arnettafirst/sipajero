@extends('layouts.front')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <h1>DISKUSI</h1>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @forelse($discussions as $discussion)
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">List group item heading</h5>
                                            <small>3 days ago</small>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <small>Author</small>
                                    </a>
                                @empty
                                    <div class="text-center">
                                        <p>Tidak terdapat diskusi apapun saat ini</p>
                                        <a class="btn btn-primary w-25" href="#">Mulai Diskusi Sekarang</a>
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
