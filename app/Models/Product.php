<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'name',
        'name_ua',
        'price',
        'description_ua',
        'description',
        'image'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy('created_at');
    }
}
