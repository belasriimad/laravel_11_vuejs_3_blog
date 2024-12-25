@extends('admin.layouts.app')

@section('title')
    Update category
@endsection

@section('content')
    <div class="row my-5">
        @include('admin.layouts.sidebar')
        <div class="col-md-8">
            <h5>Update category</h5>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="{{route('admin.categories.update',$category->slug)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name EN*</label>
                                        <input
                                            type="text"
                                            name="name_en"
                                            id="name_en"
                                            class="form-control @error('name_en') is-invalid @enderror"
                                            value="{{old('name_en',$category->name_en)}}"
                                            placeholder="Name EN"
                                            aria-describedby="helpId"
                                        />
                                        @error('name_en')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name FR*</label>
                                        <input
                                            type="text"
                                            name="name_fr"
                                            id="name_fr"
                                            class="form-control @error('name_fr') is-invalid @enderror"
                                            value="{{$category->name_fr,old('name_fr')}}"
                                            placeholder="Name FR"
                                            aria-describedby="helpId"
                                        />
                                        @error('name_fr')
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
