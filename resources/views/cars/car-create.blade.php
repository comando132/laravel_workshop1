@extends('layout')
@section('content')
    <h1>{{$title}}</h1>
    <form method="POST" action="/cars" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <select class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand_id">
                <option value="">-- Select Brand --</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @selected($brand->id == old('brand_id'))>{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Model</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model') }}" placeholder="Modelo">
            @error('model')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}" placeholder="Año" min="1900" step='1' max="2025">
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
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Precio" max="999999.00" min="100000.00" step="1.00" >
                @error('price')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><span class="material-icons">save</span> Save</button>
        <a class="btn btn-secondary" href="/cars"><span class="material-icons">keyboard_return</span> Return</a>
    </form>
@endsection
