@extends('layouts/main')

@section('content')
    <div class="d-flex justify-content-between align-items-center w-100 px-4">
        <h1>Departments</h1>
        <h3>Create New Department</h3>
    </div>
    <div class="p-3 w-75 mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Add New Department') }}
                            <a href="{{ route('departments.index') }}" class="btn btn-danger float-right">Back</a>
                        </div>
                            <form method="POST" class="py-4" action="{{ route('departments.store') }}">
                                @csrf

                                <div class="row mb-3 justify-content-between px-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
