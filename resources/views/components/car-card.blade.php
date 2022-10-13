@props(['car'])
<div class="card">
        <div class="card-header text-center"><h3>{{ $car['name'] }}</h3></div>
        <div class="card-body text-dark">
            <h5 class="card-title">Model: {{ $car['model'] }}</h5>
            <p class="card-text">Year: {{ $car['year'] }}</p>
        </div>
        <div class="card-footer bg-transparent">${{ number_format($car['price'], 2) }}</div>
</div>
