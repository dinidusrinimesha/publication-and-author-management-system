@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('author.all') }}">View Authors</a></li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div     class="col-md-12">


            <div class="d-flex justify-content-end">
                <a href="{{route('author.create')}}" class="btn btn-primary btn-sm mb-3">Add Authors</a>
            </div>

            <div class="card">
                <div class="card-header bg-primary text-white">Authors List</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">City</th>
                                <th scope="col">Email</th>
                                <th scope="col">User Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->first_name }}</td>
                                <td>{{ $author->last_name }}</td>
                                <td>{{ $author->dob }}</td>
                                <td>{{ $author->gender }}</td>
                                <td>{{ $author->contact_number }}</td>
                                <td>{{ $author->city }}</td>
                                <td>{{ $author->email }}</td>                                                                                                   
                                {{-- <td>{{ $author->is_active }}</td> --}}                                              
                                <td>
                                    @if ( $author->is_active == 1 ) 
                                        <p>Active</p>
                                    @else 
                                        <p>Inactive</p>                                       
                                    @endif
                                </td>                                                 
                                <td>
                                    <!-- Example action buttons, adjust according to your requirements -->
                                    <a href="{{ route('author.edit', $author->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('author.delete', ['id' => $author->id]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('author.view', $author->id) }}" class="btn btn-sm btn-primary">View</a>

                                    <a href="{{ route('author.toggle-status', $author->id) }}" class="btn btn-sm btn-success">Change Status</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection