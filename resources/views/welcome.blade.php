@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    @include('includes.message-block')
    <div class='row'>
        <div class='col-md-6'>
            <h3>Sign up</h3>
            <form method='post' action="{{ route('signup') }}">
                <div class="form-group ">
                    <label for='email'>Your email</label>
                    <input name='email' class='form-control {{ $errors->has('email') ? 'is-invalid' : ''}}' type='text' id='email' value="{{ Request::old('email')}}">
                </div>
                <div class='form-group '>
                    <label for='first_name'>Your first name</label>
                    <input name='first_name' class='form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}' type='text' id='first_name' value="{{ Request::old('first_name') }}">
                </div>
                <div class='form-group '>
                    <label for='password'>Your password</label>
                    <input name='password' class='form-control {{ $errors->has('password') ? 'is-invalid' : ''}}' type='password' id='password' value="{{ Request::old('password') }}">
                </div>
                <input type='hidden' name='_token' value="{{ Session::token() }}">
                <button type='submit' class='btn btn-primary'>Submit</button>
            </form>
        </div>
        <div class='col-md-6'>
            <h3>Sign in</h3>
            <form method='post' action="{{ route('signin') }}">
                <div class='form-group '>
                    <label for='email'>Your email</label>
                    <input name='email' class='form-control {{ $errors->has('email') ? 'is-invalid' : '' }}' type='text' id='email' value="{{ Request::old('email')}}">
                </div>
                <div class='form-group '>
                    <label for='password'>Your password</label>
                    <input name='password' class='form-control {{ $errors->has('email') ? 'is-invalid' : '' }}' type='password' id='password' value="{{ Request::old('password')}}">
                </div>
                <input type='hidden' name='_token' value="{{ Session::token() }}">
                <button type='submit' class='btn btn-primary'>Submit</button>
            </form>
        </div>
    </div>
@endsection
