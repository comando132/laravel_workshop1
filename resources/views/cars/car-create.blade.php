@extends('layout')
@section('content')
    <h1>{{$title}}</h1>
    <form method="POST" action="/cars">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Model</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" placeholder="Modelo">
            @error('model')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" placeholder="Año" min="1900" step='1' max="2025">
            @error('year')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="number" max="999999.00" min="100000.00" step="1.00" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Precio" required>
                @error('year')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


Name
Year
Model
Price
user_id
brand_id
