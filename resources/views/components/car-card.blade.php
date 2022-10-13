@props(['car'])
<div class="border rounded p-2">
    <h2 class="mx-auto">{{ $car['name'] }}</h2>
    <p>
        Year: {{ $car['year'] }}
    </p>
    <p>
        Model: {{ $car['model'] }}
    </p>
    <p>
        Price: {{ $car['price'] }}
    </p>
</div>
