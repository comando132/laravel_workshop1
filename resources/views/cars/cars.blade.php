@extends('layout')

@section('content')
    <h1>{{$title}}</h1>
    @auth
    <div class="row">
        <div class="col d-flex flex-wrap justify-content-start">
            <a class="btn btn-outline-info btn-lg" href="/cars/manage"><span class="material-icons">dashboard</span> My cars</a>
        </div>
        @if($edit)
        <div class="col d-flex flex-wrap justify-content-end">
            <a class="btn btn-outline-primary btn-lg" href="/cars/create"><span class="material-icons">add</span> Create</a>
        </div>
        @endif
    </div>
    <br />
    <br />
    @endauth
    @if(!$cars->isEmpty())
        {{ $cars->links("pagination::bootstrap-5") }}
        <br />
        <div class="card-columns">
            @foreach($cars as $car)
                <x-car-card :car="$car" :edit="$edit"/>
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary" role="alert">
            Sorry, there is no data to display
        </div>
    @endif
    @if($edit)
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/cars"><span class="material-icons">keyboard_return</span> Return</a>
            </div>
        </div>
    @endif

@endsection
