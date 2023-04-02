@extends('layouts.main')

@section('style')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh">
        <a href="/employees" class="learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="a-text">Employees</span>
        </a>
        <a href="{{ route('countries.index') }}" class="learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="a-text">Countries</span>
        </a>
        <a href="{{ route('states.index') }}" class="learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="a-text">States</span>
        </a>
        <a href="{{ route('cities.index') }}" class="learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="a-text">Cities</span>
        </a>
        <a href="{{ route('departments.index') }}" class="learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="a-text">Departments</span>
        </a>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
