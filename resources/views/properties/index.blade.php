@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-4">
    <h2 class="mb-4">Properties</h2>
    <div class="row">
        @foreach ($properties as $property)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/property_photos/' . $property->photo) }}" class="card-img-top" alt="{{ $property->title }}" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text mt-auto d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill" style="color: #17a2b8; margin-right: 0.5rem;"></i> 
                            {{ $property->location }}
                        </p>
                        <div class="mt-auto">
                            <span class="badge bg-primary text-white p-3">${{ number_format($property->price, 0) }}</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center align-items-center" style="background-color: #004225; padding: 0;">
                        <a href="{{ route('properties.show', $property) }}" class="btn btn-block btn-primary" style="color: white; background-color: #004225; width: 100%; border: none;">View Property</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('styles')
<style>
    .bi-geo-alt-fill {
        font-size: 1.5rem;
    }
    .badge {
        border-radius: 50%;
        width: 80px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .btn-primary {
        padding: 0.75rem;
        margin-top: auto;
        border-radius: 0;
    }
    .card-footer {
        display: flex; /* Use flexbox to center the button */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
        padding: 0 !important;
        width: 100%; /* Ensure the footer spans the width of the card */
    }
    .card-footer .btn-primary {
        width: 100%; /* Button width to 100% of parent */
        background-color: #004225; /* Match the requested color */
        border: none;
    }
</style>
@endpush
