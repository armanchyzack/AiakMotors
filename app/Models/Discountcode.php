<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discountcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'percentage',
        'status', // Add this to allow status updates
    ];
}
