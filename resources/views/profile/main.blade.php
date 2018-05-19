@extends('layouts.profile') 
@section('content-profile')

<h3>Main view</h3>

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-sm-4">

            <div class="card">

                <div class="card-header">
                    <img src="{{$user->avatar}}" alt="my_avatar">
                </div>

                <div class="card-body">

                    <form>
                        <fieldset disabled>

                            <div class="form-group">
                                <label for="disabledTextInput" class="float-left">First Name</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->f_name}}">
                            </div>

                            <div class="form-group">
                                <label for="disabledTextInput" class="float-left">Last Name</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->l_name}}">
                            </div>

                            <div class="form-group">
                                <label for="disabledTextInput" class="float-left">Email</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label for="disabledTextInput" class="float-left">User Handle</label>
                                <input type="email" id="disabledTextInput" class="form-control" placeholder="{{$user->user_handle}}">
                            </div>

                        </fieldset>
                    </form>

                    <a href="{{url('/profile/my/main/edit')}}" class="btn btn-warning">Edit Profile</a>

                </div>

            </div>


        </div>
    </div>
</div>



@stop