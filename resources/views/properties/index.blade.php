@extends('layouts.app')

@section('content')
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
                            <i class="bi bi-geo-alt-fill" style="color: #17a2b8; margin-right: 0.5rem;"></i> <!-- Location pin icon -->
                            {{ $property->location }}
                        </p>
                        <div class="mt-auto">
                            <span class="badge bg-primary text-white p-3">${{ number_format($property->price, 0) }}</span>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #004225; padding: 0;">
                        <a href="{{ route('properties.show', $property) }}" class="btn btn-block btn-primary" style="color: white; background-color: #004225; border: none;">View Property</a>
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
        width: 100%;
        padding: 0.75rem;
        margin-top: auto;
        border-radius: 0;
    }
    .card-footer {
        padding: 0 !important;
    }
    .card-footer .btn-primary {
        border-radius: 0;
        width: 100%;
        background-color: #004225;
        border: none;
    }
</style>
@endpush
