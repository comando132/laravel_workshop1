@extends('layout')
@section('content')
    <h1>{{$title}}</h1>
    <form method="POST" action="/users" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre">
            @error('name')
            <div class="invalid-feedback">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="brand">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password2') }}" placeholder="Password">
            @error('password_confirmation')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><span class="material-icons">person_add</span> Create</button>
        <a class="btn btn-secondary" href="/"><span class="material-icons">keyboard_return</span> Return</a>
    </form>
@endsection
