@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="card-img-top" src={{ Auth::user()->avatar }} style=" width:80px; margin: 10px; margin-top:
                            20px;">
                        </div>
                        <div class="col-md-8">

                            <div style="margin-top: 17%; margin-left:0%;">

                                <a href="#"><b>{{ Auth::user()->f_name }} {{ Auth::user()->l_name }} </b></a><br>
                                <a href="#">@ {{ Auth::user()->user_handle }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col col-sm-6">
                                <b>Pals</b><br> 123
                            </div>
                            <div class="col col-sm-6">
                                <b>Contacts</b><br> 123
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">
                    Suggested Brands
                </div>
                <div class="card-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, dolore illum magnam perspiciatis quibusdam harum dignissimos
                    dolor, culpa, est corrupti quod non asperiores accusamus id eos neque aut voluptatibus? Deleniti.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    My Brands
                </div>

                @if(sizeof($brands)!==0) @foreach ($brands as $brand)

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="card-img-top" src={{ $brand->avatar }} style=" width:80px; margin: 10px; margin-top:
                            20px;">
                        </div>
                        <div class="col-md-8">

                            <div style="margin-top: 17%; margin-left:0%;">

                                <a href="#"><b>{{ $brand->name }}</b></a><br>
                                <a href="#">{{$brand->email}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col col-sm-6">
                                <b>Pals</b><br> {{$brand->followers}}
                            </div>
                            <div class="col col-sm-6">
                                <b>Score</b><br> {{$brand->score}}
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach @else

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            Add a brand to manage
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <a href="#">
                                <i class="fas fa-plus fa-2x"></i>
                            </a>
                        </div>
                    </div>

                </div>

                @endif
            </div>
        </div>
    </div>

</div>
@endsection