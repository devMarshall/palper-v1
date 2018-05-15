@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="card-img-top" src={{ Auth::user()->avatar }} style=" width:80px; margin: 10px; margin-top: 15px;">
                        </div>
                        <div class="col-md-8">
                            <p style="margin-top: 30px">Hello aoagf oasiaps pash cashp </p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, dolore illum magnam perspiciatis quibusdam harum dignissimos
                    dolor, culpa, est corrupti quod non asperiores accusamus id eos neque aut voluptatibus? Deleniti.
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
                <div class="card-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, dolore illum magnam perspiciatis quibusdam harum dignissimos
                    dolor, culpa, est corrupti quod non asperiores accusamus id eos neque aut voluptatibus? Deleniti.
                </div>
            </div>
        </div>
    </div>

</div>
@endsection