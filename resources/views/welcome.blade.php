@extends('layouts.front')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-md-6">
                    <h1 class="mt-5">SIPAJERO</h1>
                    <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias amet debitis dicta doloremque, earum est itaque magni minima nemo odit quasi quidem reiciendis sequi, sint, tempora vitae voluptates voluptatum.</p>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block w-100" src="https://picsum.photos/300/200" alt="Header">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block w-100" src="https://picsum.photos/300/200" alt="Header">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-5">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eaque et eveniet, inventore laudantium nemo sed ut veritatis. Accusamus amet deleniti dolorum eum eveniet magnam perferendis quaerat reiciendis repellendus.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eaque et eveniet, inventore laudantium nemo sed ut veritatis. Accusamus amet deleniti dolorum eum eveniet magnam perferendis quaerat reiciendis repellendus.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eaque et eveniet, inventore laudantium nemo sed ut veritatis. Accusamus amet deleniti dolorum eum eveniet magnam perferendis quaerat reiciendis repellendus.</li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <h1>INFORMASI</h1>
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
                        <p>Admin belum memberikan informasi apapun</p>
                    </div>
                @endforelse
            </div>
            <div class="row justify-content-center mt-5">
                <h1>DISKUSI</h1>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group list-group-flush mt-1">
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
                        <div class="card-footer pt-0 text-right">
                            <a class="text-primary" href="{{ route('discussion') }}">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <h1>TENTANG KAMI</h1>
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image" data-background="https://picsum.photos/300/200">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title text-center mb-0">
                                <h6 class="text-primary">I Gede Bayu Aditya Dharmawan</h6>
                                <p class="mb-0">Project Manager</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-md-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image" data-background="https://picsum.photos/300/200">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title text-center mb-0">
                                <h6 class="text-primary">Augisty Wardah Faradisa</h6>
                                <p class="mb-0">Analyst</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image" data-background="https://picsum.photos/300/200">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title text-center mb-0">
                                <h6 class="text-primary">Rizki Indra Permana</h6>
                                <p class="mb-0">Designer</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-md-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image" data-background="https://picsum.photos/300/200">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title text-center mb-0">
                                <h6 class="text-primary">Arnetta Firstianti Widodo</h6>
                                <p class="mb-0">Programmer</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-md-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image" data-background="https://picsum.photos/300/200">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title text-center mb-0">
                                <h6 class="text-primary">Sakti Prakasa</h6>
                                <p class="mb-0">Tester</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
