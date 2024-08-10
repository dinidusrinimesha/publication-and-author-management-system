@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2 class="my-2 text-center mb-3">{{ ($publication->first_name) }}</h2>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection