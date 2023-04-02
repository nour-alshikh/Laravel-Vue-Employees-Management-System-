@extends('layouts/main')

@section('content')
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <div class="d-flex justify-content-between align-items-center w-100 px-4" >
        <h1>Departments</h1>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="search w-100 my-5">
        <form method="GET" action="{{ route('departments.index') }}" class="row justify-content-between mx-auto w-25">
            @csrf
            <input class="form-control w-50" type="search" name="search" placeholder="Search by name...." />
            <button class="btn btn-primary">
                Search
            </button>
        </form>
    </div>
    <div class="px-5 w-100">
        <table class="table table-hover ">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr>
                    <th scope="row">{{ $department->id }}</th>
                    <td>{{ $department->name }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('departments.edit' , $department->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection
