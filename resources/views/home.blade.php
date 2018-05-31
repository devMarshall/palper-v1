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
            <div class="container">
                <div class="card">
                    <div class="card-body">My Feed</div>
                </div>

                @if (sizeof($posts)!=0) @foreach ($posts as $post)

                <div class="container-fluid" style="margin-top: 10px;">
                    <div class="card text-white bg-dark">
                        @if ($post->img !== NULL)

                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <img src={{$post->img}} style="width: 70%; height:auto;">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-flex justify-content-start">
                                            <p>{{$post->text}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @else
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <p>{{$post->text}}</p>
                            </div>
                        </div>
                        @endif
                        <div class="card-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{$post->brand_name}}
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-flex justify-content-end">
                                            <i class="fas fa-heart" style="padding: 5px;"></i>
                                            <i class="fas fa-comment" style="padding: 5px;"></i>
                                            <i class="fas fa-paper-plane" style="padding: 5px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach @else
                <p>No feed here, pal up with brands to fill up your feed</p>
                @endif

            </div>

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

                    <div class="container">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newpost_modal">
                            New Post 
                        </button>
                    </div>

                </div>


                @endforeach

                <!-- Modal -->
                <div class="modal fade" id="newpost_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{$managed_brand->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="card">
                                        {!! Form::open(['route'=>['create.post'],'method'=>'POST', 'files' => true]) !!}
                                        <div class="card-body">


                                            {{Form::hidden('brand_id', $managed_brand->id)}}

                                            <div class='form-group'>
                                                {{Form::label('title','Post text')}} {{Form::text('text','',['class'=>'form-control', 'placeholder'=>'Max text of 255 words'])}}
                                            </div>
                                            <div class='form-group'>
                                                {{Form::file('img', ['type'=>'file','class'=>'form-control'])}}
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="container">
                                                <div class="row content-justify-center">
                                                    <div class="float-right col-sm-6">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    <div class="float-right col-sm-6">
                                                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}} {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>


                @else

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