@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-5 align-self-center">
            <h1>Login</h1>
            <br />
            <form method="POST" action="/authenticate" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter email" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{old('password')}}">
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-outline-primary btn-lg btn-block" type="submit"><span class="material-icons">login</span>Login</button>
            </form>
        </div>
    </div>
@endsection
