@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="crad-header">
                    <h4 class="text-center my-2">
                        Register
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route("register")}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                Name*
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"
                                    required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                Email*
                            </label>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"
                                    required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                Password*
                            </label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required>
                                @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                                Confirm Password*
                            </label>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" id="password-confirm"
                                    class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection