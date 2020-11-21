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
            <div class="row">
                <div class="col-12">
                    <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('{{ url('/storage/thumbnail/' . $information->thumbnail) }}');">
                        <div class="hero-inner text-center">
                            <div class="row justify-content-end">
                                @guest
                                @elseif(Auth::user()->role == 'farmer')
                                @elseif(Auth::user()->role == 'admin')
                                    <a class="btn btn-icon btn-primary mr-3" href="{{ route('admin.information.edit', $information->slug) }}"><i class="fas fa-edit"></i></a>
                                @endif
                            </div>
                            <div class="p-5">
                                <h1>{{ $information->title }}</h1>
                                <p class="lead">{{ $information->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {!! $information->contents !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
