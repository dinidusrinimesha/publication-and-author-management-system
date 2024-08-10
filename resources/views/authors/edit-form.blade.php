@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Author</div>

                <div class="card-body">
                    <form action="{{ route('authors.update', $author->id) }}" method="POST">
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
                            <label for="date_of_birth" class="form-label">DOB</label>
                            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $author->date_of_birth }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $author->address }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $author->phone_number }}">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <!-- <input type="text" class="form-control" id="gender" name="gender" value="{{ $author->gender }}"> -->

                            <input id="male" type="radio" class="form-check-input @error('address') is-invalid @enderror" name="gender" value="{{ $author->gender }}">
                            <label for="male">
                                Male
                            </label>

                            <input id="female" type="radio" class="form-check-input @error('address') is-invalid @enderror" name="gender" value="{{ $author->gender }}" required autocomplete="gender" autofocus>
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