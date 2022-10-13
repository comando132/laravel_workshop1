@extends('layout')

@section('content')
    <h1>{{$title}}</h1>
    @auth
    <div class="row">
        <div class="col d-flex flex-wrap justify-content-start">
            <a class="btn btn-outline-primary btn-lg" href="/cars/create"><span class="material-icons">add</span> Create</a>
        </div>
        <div class="col d-flex flex-wrap justify-content-end">
            <a class="btn btn-outline-info btn-lg" href="/cars/manage"><span class="material-icons">dashboard</span> My cars</a>
        </div>
    </div>
    <br />
    <br />
    @endauth
    {{$cars->links("pagination::bootstrap-5")}}
    <br />
    <div class="container">
        <div class="row">
            @foreach($cars as $car)
                <div class="col-4">
                    <x-car-card :car="$car" />
                </div>
            @endforeach
        </div>
    </div>
@endsection