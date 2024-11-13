@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-6 mb-2">
                            <div class="card h-100">
                                <img src="{{asset($post->image)}}" 
                                    alt="{{$post->title_en}}" 
                                    class="card-img-top"
                                >
                                <div class="card-body">
                                    <div class="card-title fw-bold">
                                        @if (session('lang') === 'fr')
                                            {{$post->title_fr}}
                                        @else 
                                            {{$post->title_en}}
                                        @endif
                                    </div>
                                    <div class="card-text">
                                        @if (session('lang') === 'fr')
                                            {{Str::limit($post->body_fr, 100)}}
                                        @else 
                                            {{Str::limit($post->body_en, 100)}}
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <a href="{{route('posts.show',$post)}}" 
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                    <Like 
                                        :id="{{$post->id}}"
                                        :likes="{{$post->likes}}"
                                    ></Like>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer bg-white d-flex justify-content-center">
                <div class="my-3">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
@endsection