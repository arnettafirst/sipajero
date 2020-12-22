@extends('layouts.front')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-md-6">
                    <h1 class="mt-5">SIPAJERO</h1>
                    <p class="mt-5">Selamat datang di SIPAJERO (Sistem Peramalan Hasil Produksi Jeruk Keprok). Sistem berbasis website ini berfungsi untuk membantu petani jeruk keprok untuk meramalkan hasil produksi jeruk keprok di kebunnya. Terdapat beberapa fitur dalam sistem ini, seperti Peramalan, Informasi, Diskusi, dan Laporan.</p>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2020/11/16/04/00/oranges-5747890_1280.jpg" alt="Header">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2015/06/29/08/52/mandarin-825337_1280.jpg" alt="Header">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-5">
                    <ul>
                        <li>Fitur Peramalan : Merupakan fitur utama dalam sistem ini yang berfungsi untuk membantu petani kebun jeruk keprok untuk meramalkan hasil produksi jeruknya.</li>
                        <li>Fitur Informasi : Merupakan fitur yang berisi artikel informatif seputar perkebunan atau pertanian dan dapat diakses oleh siapa saja</li>
                        <li>Fitur Diskusi : Merupakan fitur di mana akan terjadi forum didalamnya, dan pengguna akan dapat saling berinteraksi untuk membahas topik seputar pertanian atau perkebunan</li>
                        <li>Fitur Laporan : Merupakan fitur aduan, di mana petani dapat mengajukan aduan kepada admin apabila terdapat kendala dalam mengoperasikan website ini</li>
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
                                    <a href="{{ route('discussion.detail', $discussion->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $discussion->title }}</h5>
                                        <small class="text-primary">{{ $discussion->created_at }}</small>
                                    </div>
                                    <p class="mb-1">{{ $discussion->excerpt }}</p>
                                    <small class="font-weight-600">{{ $discussion->user->firstname }}</small>
                                </a>
                                @empty
                                    <div class="text-center">
                                        @guest
                                            <p>Tidak terdapat diskusi apapun saat ini</p>
                                            <a class="btn btn-primary w-25" href="#" data-toggle="modal" data-target="#loginModal">Mulai Diskusi Sekarang</a>
                                        @elseguest
                                            <p>Tidak terdapat diskusi apapun saat ini</p>
                                        @endif
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
                            <div class="article-image" data-background="https://scontent.fsub9-1.fna.fbcdn.net/v/t1.0-9/102420759_2719461398287947_2245510973193993953_o.jpg?_nc_cat=101&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeF2iSIJn3QIu_tQDOv-3MJzg8gyrO9Jyp-DyDKs70nKnxNry1WyT-8KtYZmJpNQsJ8I724E-M-eljxLlRZMe5kn&_nc_ohc=sDXYShzAK-UAX9JL1Mz&_nc_ht=scontent.fsub9-1.fna&oh=4d671d8ae417607e9220676c7c2f3ce6&oe=60080964">
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
                            <div class="article-image" data-background="https://scontent.fsub9-1.fna.fbcdn.net/v/t1.0-9/123164889_2771166286536317_7802601012965438635_o.jpg?_nc_cat=106&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeGgPncPGug8sUY7HHMdfXzdxsk-zm_kFGzGyT7Ob-QUbLAaLI1ujcTDDuaDcuxfJVFcTw1iowEAGvpC5NcChUZW&_nc_ohc=1OfvkjW8foUAX9H8u04&_nc_ht=scontent.fsub9-1.fna&oh=07786233436a1c980eca649ad831a02f&oe=60073007">
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
                            <div class="article-image" data-background="https://scontent.fsub9-1.fna.fbcdn.net/v/t1.0-9/71567021_1254525764729010_2055798899527909376_o.jpg?_nc_cat=107&ccb=2&_nc_sid=e3f864&_nc_eui2=AeHSimzBlPjy1M9vyzJqWCcgXKWPjGVjralcpY-MZWOtqaA4u-QT_kLQxPsnD67C9Voa7m6Cd2e7tsDk-PJsVkWT&_nc_ohc=hARPL6Ax74MAX_3Km0R&_nc_ht=scontent.fsub9-1.fna&oh=8c73dce23c67100007c5042c34f3058c&oe=60076E2B">
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
                            <div class="article-image" data-background="https://scontent.fsub9-1.fna.fbcdn.net/v/t1.0-0/c0.39.304.304a/p180x540/123549764_2248638188615001_1648246149325907393_o.jpg?_nc_cat=102&ccb=2&_nc_sid=da31f3&_nc_eui2=AeH5g8yVMIXHBg2QggeU1-VMrRGKXy_rrQutEYpfL-utCwYBmp0BRWXsnZtEo_4dUvBNXRqxf9wWlhv_GpttGFQc&_nc_ohc=gvo5AYyG4z0AX_Rivwt&_nc_ht=scontent.fsub9-1.fna&tp=27&oh=c75a517693b1c7388d5d55f717bc19fd&oe=60061B57">
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
                            <div class="article-image" data-background="https://scontent.fsub9-1.fna.fbcdn.net/v/t31.0-8/16402464_374223292951243_255069526956767139_o.jpg?_nc_cat=107&ccb=2&_nc_sid=19026a&_nc_eui2=AeG0TxUe977k59DnrKp65JOEPSEFRiXYHVo9IQVGJdgdWnMemWXzHEykwnZNuTgtH4MkL0DsiFqhWMpt8OaLaTSo&_nc_ohc=mddEvHSmen8AX87Ft10&_nc_ht=scontent.fsub9-1.fna&oh=45097c95d06780a581a55f75cf2f4da6&oe=6005AEA3">
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
