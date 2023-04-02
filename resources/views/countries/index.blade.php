@extends('layouts/main')

@section('content')
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <div class="d-flex justify-content-between align-items-center w-100 px-4">
        <h1>Countries</h1>
        <a href="{{ route('countries.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="search w-100 my-5 ">
        <form method="GET" action="{{ route('countries.index') }}" class="row justify-content-between mx-auto w-25">
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
                <th scope="col">Country</th>
                <th scope="col">Country Code</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                <tr>
                    <th scope="row">{{ $country->id }}</th>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->country_code }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('countries.edit' , $country->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
