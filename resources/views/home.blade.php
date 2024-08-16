@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @auth
            @if (Auth::user()->role === 'admin')
            <div class="card d-flex">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <div>
                            <h2>Welcome to the <span class="text-danger fw-bold">Admin Module</span></h2>
                        </div>
                        <img src="/images/admin.svg" alt="admin-img" class="w-50 img-fluid px-4">
                    </div>

                    <div class="container my-4">
                        <h2 class="text-center">Admin Features</h2>
                        <div class="row my-4">
                            <div class="col">
                                <a href="{{ route('author.create') }}" class="btn btn-primary">Add Authors</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('author.all') }}" class="btn btn-primary">View Authors</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('category.create') }}" class="btn btn-warning">Add Categories</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('category.all') }}" class="btn btn-warning">View Categories</a>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>

            @elseif (Auth::user()->role === 'reader')
            <div class="row bg-light">
                @foreach ($publications as $publication)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="row p-2 my-2 mx-1 bg-white rounded shadow">
                            <div class="col">
                                <div class="row">
                                    <div class="h3 fw-bold text-center">
                                        {{$publication->pub_name}}
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <img src="{{ asset('uploads/covers/' . $publication->cover_picture ) }}" alt="Image Description" class="img-fluid">
                                </div>

                                <div class="row">
                                    <p>Author: <span class="fw-bold">{{$publication->author?->first_name}} {{$publication->author?->last_name}}</span></p>
                                </div>

                                <div class="row">
                                    <p>ISBN: <span class="fw-bold">{{$publication->isbn}}</span></p>
                                </div>

                                <div class="row">
                                    <p>Category: <span class="fw-bold">{{$publication->category->name}}</span></p>
                                </div>

                                <div class="row">
                                    <p>Published Date: <span class="fw-bold">{{$publication->published_date}}</span></p>
                                </div>

                                <div class="row">
                                    <a href="{{ route('publication.view', $publication->id) }}" class="btn btn-primary">View</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>                  
                @endforeach
            </div>

            @elseif (Auth::user()->role === 'author')
            <div class="card">
                <div class="card-header">Author Section</div>

                <div class="card-body">
                    <p>Welcome, Author! Here are your author tasks.</p>
                    <a href="{{ route('publication-register') }}" class="btn btn-primary btn-sm mb-3">Create Publication</a>

                    <a href="#" class="btn btn-primary btn-sm mb-3 ms-4">View Publications</a>

                    <!-- Add author specific content here -->
                </div>
            </div>

            @endif
            @endauth

        </div>
    </div>
</div>
@endsection
