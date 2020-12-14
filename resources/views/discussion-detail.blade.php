@extends('layouts.front')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tickets justify-content-center">
                                <div class="ticket-content w-100">
                                    <div class="ticket-header">
                                        <div class="ticket-detail">
                                            <div class="ticket-title">
                                                <h4>
                                                    {{ $discussion->title }}
                                                    @guest
                                                    @elseif(Auth::user()->role == 'farmer')
                                                        @if(Auth::id() == $discussion->user_id)
                                                            <a class="btn btn-icon btn-primary ml-1" href="{{ route('farmer.discussion.edit', $discussion->slug) }}"><i class="fas fa-edit"></i></a>
                                                        @endif
                                                    @elseif(Auth::user()->role == 'admin')
                                                        @if(Auth::id() == $discussion->user_id)
                                                            <a class="btn btn-icon btn-primary ml-1" href="{{ route('admin.discussion.edit', $discussion->slug) }}"><i class="fas fa-edit"></i></a>
                                                        @endif
                                                    @endif
                                                </h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div class="font-weight-600">{{ $discussion->user->firstname }}</div>
                                                <div class="bullet"></div>
                                                <div class="text-primary font-weight-600">{{ $discussion->created_at }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-description">
                                        {!! $discussion->contents !!}
                                        <div class="ticket-divider"></div>
                                        @foreach($comments as $comment)
                                            <div class="d-flex flex-row">
                                                <small class="font-weight-600">{{ $comment->user->firstname }}</small>
                                                <small class="bullet"></small>
                                                <small class="text-primary font-weight-600">{{ $comment->created_at }}</small>
                                            </div>
                                            {!! $comment->contents !!}
                                            <div class="ticket-divider"></div>
                                        @endforeach
                                        @auth
                                            <div class="ticket-form">
                                                @if(Auth::user()->role == 'admin')
                                                    <form method="POST" action="{{ route('admin.comment.store', $discussion->slug) }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <textarea id="contents" class="form-control{{ $errors->has('contents') ? ' is-invalid' : '' }} summernote" name="contents" required></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('contents') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-right">
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            Reply
                                                        </button>
                                                    </div>
                                                </form>
                                                @elseif(Auth::user()->role == 'farmer')
                                                    <form method="POST" action="{{ route('farmer.comment.store', $discussion->slug) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <textarea id="contents" class="form-control{{ $errors->has('contents') ? ' is-invalid' : '' }} summernote" name="contents" required></textarea>
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('contents') }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary btn-block">
                                                                Reply
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endif
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection
