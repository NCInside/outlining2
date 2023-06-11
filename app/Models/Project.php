<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'bg',
        'title',
        'description',
        'photo',
        'video',
        'name',
        'nim',
        'profile',
        'ig',
        'wa',
        'qr',
        'qrlink',
        'highlight',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function galeries(): HasMany
    {
        return $this->hasMany(Galery::class);
    }
}
