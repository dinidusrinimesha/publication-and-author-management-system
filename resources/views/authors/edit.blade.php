@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- @if (@error->any())
                <div class="alert alert-danger" role="alert">
                    <h3>Failed to create the author</h3>
                    Plese correct the following error:
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div class="card">
                <div class="card-header">Edit Author</div>

                <div class="card-body">
                    <form action="{{ route('author.update', $author->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $author->first_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $author->last_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $author->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $author->dob }}">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $author->city }}">
                        </div>
                        <div class="mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contct_number" value="{{ $author->contact_number }}">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <!-- <input type="text" class="form-control" id="gender" name="gender" value="{{ $author->gender }}"> -->

                            <input id="male" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="{{ 'male' }}" {{ $author-> gender=='male'? 'checked' : '' }}>
                            <label for="male">
                                Male
                            </label>

                            <input id="female" type="radio" class="form-check-input @error('address') is-invalid @enderror" name="gender"  value="{{ 'female' }}" {{ $author-> gender=='female'? 'checked' : '' }}required autocomplete="gender" autofocus>
                            <label for="male">
                                Female
                            </label>

                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection