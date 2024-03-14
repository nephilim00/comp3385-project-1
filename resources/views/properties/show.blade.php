{{-- resources/views/properties/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset('storage/property_photos/' . $property->photo) }}" class="card-img-top" alt="{{ $property->title }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $property->title }}</h3>
                    <p class="card-text">{{ $property->description }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Bedrooms: {{ $property->number_of_bedrooms }}</li>
                        <li class="list-group-item">Bathrooms: {{ $property->number_of_bathrooms }}</li>
                        <li class="list-group-item">Location: {{ $property->location }}</li>
                        <li class="list-group-item">Price: {{ number_format($property->price, 2) }}</li>
                        <li class="list-group-item">Type: {{ ucfirst($property->type) }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Email Realtor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
