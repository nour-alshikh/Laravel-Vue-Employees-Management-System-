@extends('layouts/main')

@section('content')
    <div class="d-flex justify-content-between align-items-center w-100 px-4">
        <h1>states</h1>
        <h3>Update State - {{ $state->name }}</h3>
    </div>
    <div class="p-3 w-75 mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Update State') }}
                            <a href="{{ route('states.index') }}" class="btn btn-danger float-right">Back</a>
                        </div>
                            <form method="POST" class="py-4" action="{{ route('states.update' , $state->id) }}">
                                @csrf
                                @method("PUT")
                                <div class="row mb-3 justify-content-between px-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $state->name) }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-between px-4">
                                    <label for="country_code" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                                    <div class="col-md-6">

                                        <select class="form-control" aria-label="Default select example" name="country_id">
                                            <option selected>Open this select menu</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ $country->id === $state->country->id ? 'selected' :'' }}>{{ $country->country_code }}</option>
                                            @endforeach
                                        </select>

                                        @error('country_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="text-center my-4">
                <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="event.preventDefault();">
                    Delete {{ $state->name }}
                </a>
        </div>
        </div>
    </div>



        <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete {{ $state->name }} ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                                        {{ __('Delete') }}
                    </a>

                    <form id="delete-form" action="{{ route('states.destroy' ,$state->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
