<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- 1. EKLEME
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory; // <-- 2. EKLEME

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'category',
        'base_price',
        'duration_minutes',
    ];
}