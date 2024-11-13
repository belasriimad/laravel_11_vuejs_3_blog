@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row my-5">
        @include('admin.layouts.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-success shadow-sm text-white">
                                <div class="card-header text-center">
                                    <h5 class="mt-2">
                                        Categories
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold text-center">
                                        {{ $categories->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-primary shadow-sm text-white">
                                <div class="card-header text-center">
                                    <h5 class="mt-2">
                                        Posts
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold text-center">
                                        {{ $posts->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection