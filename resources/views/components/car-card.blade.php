@props(['car', 'edit'])
<div class="card">
    <div class="card-header text-center"><h3>{{ $car['name'] }}</h3></div>
    <div class="card-body text-dark">
        <h5 class="card-title">Model: {{ $car['model'] }}</h5>
        <p class="card-text">Year: {{ $car['year'] }}</p>
        <p class="card-text">${{ number_format($car['price'], 2) }}</p>
    </div>
    @if($edit)
        <div class="card-footer bg-transparent row">
            <div class="col">
                <a class="btn btn-outline-primary btn-sm" href="/cars/edit/{{ $car->id }}"><span class="material-icons">edit_note</span></a>
            </div>
            <div class="col">
                <form method="POST" action="/cars/{{ $car->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="submit"><span class="material-icons">delete</span></button>
                </form>
            </div>
        </div>
    @endif
</div>
