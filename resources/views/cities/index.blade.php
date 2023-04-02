@extends('layouts/main')

@section('content')
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <div class="d-flex justify-content-between align-items-center w-100 px-4" >
        <h1>Cities</h1>
        <a href="{{ route('cities.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="search w-100 my-5">
        <form method="GET" action="{{ route('cities.index') }}" class="row justify-content-between mx-auto w-25">
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
                <th scope="col">City</th>
                <th scope="col">State Code</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                <tr>
                    <th scope="row">{{ $city->id }}</th>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->state->name }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('cities.edit' , $city->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection
