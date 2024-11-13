@extends('admin.layouts.app')

@section('title')
    Update post
@endsection

@section('content')
    <div class="row my-5">
        @include('admin.layouts.sidebar')
        <div class="col-md-8">
            <h5>Update post</h5>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="{{route('admin.posts.update',$post->slug)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title EN*</label>
                                        <input
                                            type="text"
                                            name="title_en"
                                            id="title_en"
                                            class="form-control @error('title_en') is-invalid @enderror"
                                            value="{{$post->title_en,old('title_en')}}"
                                            placeholder="Title EN"
                                            aria-describedby="helpId"
                                        />
                                        @error('title_en')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title FR*</label>
                                        <input
                                            type="text"
                                            name="title_fr"
                                            id="title_fr"
                                            class="form-control @error('title_fr') is-invalid @enderror"
                                            value="{{$post->title_fr,old('title_fr')}}"
                                            placeholder="Title FR"
                                            aria-describedby="helpId"
                                        />
                                        @error('title_fr')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="body_en" class="form-label">Body EN*</label>
                                        <textarea 
                                            class="form-control @error('body_en') is-invalid @enderror" 
                                            name="body_en" id="body_en" rows="3"
                                            placeholder="Body EN*">{{$post->body_en,old('body_en')}}</textarea>
                                        @error('body_en')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="body_fr" class="form-label">Body FR*</label>
                                        <textarea 
                                            class="form-control @error('body_fr') is-invalid @enderror" 
                                            name="body_fr" id="body_fr" rows="3"
                                            placeholder="Body FR*">{{$post->body_fr,old('body_fr')}}</textarea>
                                        @error('body_fr')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Choose file</label>
                                        <input
                                            type="file"
                                            class="form-control @error('image') is-invalid @enderror"
                                            name="image"
                                            id="image"
                                        />
                                        <div class="my-2">
                                            <img src="{{asset($post->image)}}" 
                                                alt="{{ $post->title_en }}" 
                                                width="60"
                                                height="60"
                                                class="rounded"
                                            >
                                        </div>
                                        @error('image')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category*</label>
                                        <select
                                            class="form-select @error('category_id') is-invalid @enderror"
                                            name="category_id"
                                            id="category_id"
                                        >
                                            <option selected disabled value="">Choose a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $post->category_id === $category->id ? 'selected' : ''}}>
                                                    {{ $category->name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button
                                            type="submit"
                                            class="btn btn-dark btn-sm"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection