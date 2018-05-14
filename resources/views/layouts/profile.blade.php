@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h4>My Profile</h4>
    </div>


    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/profile/my/main') }}">Main</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{ url('/profile/my/posts') }}">My Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/profile/my/followers') }}">Followers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/profile/my/following') }}">Following</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/profile/my/brands') }}">My Brands</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            {{--
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> --}}
             @yield('content-profile')

        </div>
    </div>
</div>
</div>
@endsection