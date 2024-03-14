<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'number_of_bedrooms' => 'required|integer|min:1',
        'number_of_bathrooms' => 'required|integer|min:1',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'type' => 'required|string|in:house,apartment',
        'description' => 'required|string',
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Handle file upload
    $fileNameToStore = $this->handleFileUpload($request);

    // Create and save the property
    $property = new Property();
    $property->fill($validatedData);
    $property->photo = $fileNameToStore;
    $property->save();

    return redirect('/properties')->with('success', 'Property added successfully!');
}

protected function handleFileUpload(Request $request)
{
    if ($request->hasFile('photo')) {
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('photo')->storeAs('public/property_photos', $fileNameToStore);
        return $fileNameToStore;
    } else {
        return 'noimage.jpg';
    }
}


    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}
