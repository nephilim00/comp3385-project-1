{{-- resources/views/properties/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add New Property</h2>
    <div class="card p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Property Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="number_of_bedrooms" class="form-label">No. of Rooms</label>
                    <input type="text" class="form-control" id="number_of_bedrooms" name="number_of_bedrooms" value="{{ old('number_of_bedrooms') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="number_of_bathrooms" class="form-label">No. of Bathrooms</label>
                    <input type="text" class="form-control" id="number_of_bathrooms" name="number_of_bathrooms" value="{{ old('number_of_bathrooms') }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">Property Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="" disabled selected>Choose...</option>
                        <option value="house" {{ old('type') == 'house' ? 'selected' : '' }}>House</option>
                        <option value="apartment" {{ old('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input class="button" type="file" id="photo" name="photo" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Property</button>
        </form>
    </div>
</div>
@endsection
