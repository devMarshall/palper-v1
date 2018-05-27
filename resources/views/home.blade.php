@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="card-img-top" src={{ Auth::user()->avatar }} style="border-radius:50%; width:80px;
                            margin: 10px; margin-top: 20px;">
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
                <div class="card-header">My Feed</div>
            </div>

            @if (sizeof($posts)!=0) @foreach ($posts as $post)

            <div class="card">
                <div class="card-footer">{{$post->brand_name}}</div>
            </div>
            @endforeach @else
            <p>No feed here, pal up with brands to fill up your feed</p>
            @endif

            <div class="card"></div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    My Brands
                </div>

                @if(sizeof($managed_brands)!==0) @foreach ($managed_brands as $managed_brand)

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="card-img-top" src={{ $managed_brand->avatar }} style="border-radius:50%; width:80px;
                            height:80px; margin: 0px; margin-top: 20px; position:absolute;">
                        </div>
                        <div class="col-md-8">

                            <div style="margin-top: 17%; margin-left:12%;">

                                <a href="#"><b>{{ $managed_brand->name }}</b></a><br>
                                <a href="#" style="font-size: 13px;">{{$managed_brand->email}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="margin-top:10%;">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col col-sm-6">
                                <b>Pals</b><br> {{$managed_brand->followers}}
                            </div>
                            <div class="col col-sm-6">
                                <b>Score</b><br> {{$managed_brand->score}}
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach @else

                <div class="card-body">
                    <div class="container-fluid">
                        No brands here
                    </div>

                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            Add a brand to manage
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <a href="{{ url('/create/brand') }}">
                                    <i class="fas fa-plus fa-2x"></i>
                                  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

    </div>

</div>
@endsection