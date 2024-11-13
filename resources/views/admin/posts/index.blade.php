@extends('admin.layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row my-5">
        @include('admin.layouts.sidebar')
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Posts</h5>
                <a href="{{route('admin.posts.create')}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title EN</th>
                                    <th>Title FR</th>
                                    <th>Slug</th>
                                    <th>Body EN</th>
                                    <th>Body FR</th>
                                    <th>Catgory</th>
                                    <th>Image</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <td scope="row">{{ ($posts->perPage() * ($posts->currentPage() - 1)) + $key + 1 }}</td>
                                        <td>{{ $post->title_en }}</td>
                                        <td>{{ $post->title_fr }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ Str::limit($post->body_en,50) }}</td>
                                        <td>{{ Str::limit($post->body_fr,50) }}</td>
                                        <td>{{ $post->category->name_en }}</td>
                                        <td>
                                            <img src="{{asset($post->image)}}" 
                                                alt="{{ $post->title_en }}" 
                                                width="60"
                                                height="60"
                                                class="rounded"
                                            >
                                        </td>
                                        <td class="d-flex flex-column align-items-center">
                                            <a href="{{route('admin.posts.edit',$post->slug)}}" class="btn btn-sm btn-warning my-1">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <a href="#" onclick="document.getElementById({{$post->id}}).submit();" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="{{$post->id}}" action="{{route('admin.posts.delete',$post->slug)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection