<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    public function getPriceForWeight(int $weight): float
    {
        return $this->prices()->where('quantity', '<=', $weight)->orderBy('quantity', 'desc')->firstOrFail()->cost;
    }
}
