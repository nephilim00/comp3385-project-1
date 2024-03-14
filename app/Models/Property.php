<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'location',
        'price',
        'type',
        'description',
        'photo',
    ];

    // Add any additional model functionality here. For example, relationships, scopes, or custom methods.
}
