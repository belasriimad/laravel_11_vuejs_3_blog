@extends('admin.layouts.app')

@section('title')
    Categories
@endsection

@section('content')
    <div class="row my-5">
        @include('admin.layouts.sidebar')
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Categories</h5>
                <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-primary">
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
                                    <th scope="col">#</th>
                                    <th scope="col">Name EN</th>
                                    <th scope="col">Name FR</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td scope="row">{{ ($categories->perPage() * ($categories->currentPage() - 1)) + $key + 1 }}</td>
                                        <td>{{ $category->name_en }}</td>
                                        <td>{{ $category->name_fr }}</td>
                                        <td>
                                            <a href="{{route('admin.categories.edit',$category->slug)}}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <a href="#" onclick="document.getElementById({{$category->id}}).submit();" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="{{$category->id}}" action="{{route('admin.categories.delete',$category->slug)}}" method="post">
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
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection