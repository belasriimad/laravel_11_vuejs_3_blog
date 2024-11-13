@extends('layouts.app')

@section('title')
    {{ $post->title_en }}
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card p-4">
                        <img src="{{asset($post->image)}}" 
                            alt="{{$post->title_en}}" 
                            class="card-img-top"
                        >
                        <div class="card-body">
                            <div class="d-flex justify-content-center my-3">
                                <span class="badge bg-danger">
                                    <i class="fas fa-clock me-1"></i>
                                    {{ $post->created_at }}
                                </span>
                                <span class="badge bg-success mx-1">
                                    <i class="fas fa-tag me-1"></i>
                                    {{ $post->category->name_en }}
                                </span>
                            </div>
                            <div class="fw-bold">
                                {{ $post->title_en }}
                            </div>
                            <div class="card-text">
                                {{ $post->body_en }}
                            </div>
                            <hr>
                            <div class="row my-2">
                                <div class="col-md-11 mx-auto d-flex flex-wrap justify-content-start aling-items-center">
                                    <span class="fw-bold">
                                        Tags:
                                    </span>
                                    @foreach ($post->tags as $tag)
                                        <span class="bg-light rounded fw-bold mx-1 mb-1">
                                            <a href="{{route('tag.posts',$tag)}}" class="btn btn-link text-decoration-none text-dark">
                                                {{ $tag->name }}
                                            </a>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-12 d-flex flex-wrap justify-content-start aling-items-center">
                                    @isset($previous)
                                        <a href="{{route('posts.show',$previous)}}" class="btn btn-link">
                                            Previous:
                                            {{ $previous->title_en }}
                                        </a>
                                    @endisset
                                    @isset($next)
                                        <a href="{{route('posts.show',$next)}}" class="btn btn-link">
                                            Next:
                                            {{ $next->title_en }}
                                        </a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <comment-list :post_id={{$post->id}}></comment-list>
                    @auth
                        <add-comment :post_id={{$post->id}}
                            :user_id={{auth()->user()->id}}></add-comment>
                    @endauth
                    @guest
                        <div class="alert alert-info">
                            <a href="{{route('login')}}" class="btn btn-link">
                                Log in to add your comments.
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
@endsection